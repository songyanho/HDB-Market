<?php

if (!defined('IN_CORE_SYSTEM')){die('INVALID DIRECT ACCESS');}

$app->group('/guest', function(){
    
    $this->map(['get', 'post'], '/login', function ($request, $response, $args) {
        $twigVar = ['title' => 'Login', 'error' => false];
        if($request->isPost()){
            $params = $request->getParsedBody();
            $user = null;
            $user = UserQuery::create()->findOneByEmail($params['email']);
            if($user != false){
                if(Core::verifyHashing($params['password'], $user->getPassword())){
                    $class = $user->getDescendantClass().'Query';
                    $user = $class::create()->findPK($user->getId());
                    Core::loginUser($user);
                    $response = $response->withStatus(302)->withHeader('Location', $this->router->pathFor(HdbCore::ROLE_GUEST.'#public@redirect'));
                    return $response;
                }
            }
            $twigVar['error'] = true;
        }
//        $fb = new Facebook\Facebook([
//            'app_id' => '495795723943655',
//            'app_secret' => '40fdfb983ee2429e01c3bf3ad7080aa4',
//            'default_graph_version' => 'v2.5',
//        ]);
//        $helper = $fb->getRedirectLoginHelper();
//        $permissions = ['email']; // optional
//        $loginUrl = $helper->getLoginUrl('http://hdb.local/guest/facebook', $permissions);
        $loginUrl = 'http://hdb.appbox.com.my/login.php';
        $twigVar['facebook'] = $loginUrl;

        return $this->view->render($response, 'login.html', $twigVar);
    })->setName(HdbCore::ROLE_GUEST.'#guest@login.login');
    
    $this->map(['get', 'post'], '/facebook', function ($request, $response, $args){
        $twigVar = ['title' => 'Login', 'error' => false];
        $fb = new Facebook\Facebook([
            'app_id' => '495795723943655',
            'app_secret' => '40fdfb983ee2429e01c3bf3ad7080aa4',
            'default_graph_version' => 'v2.5',
        ]);

        $helper = $fb->getRedirectLoginHelper();
        try {
            $accessToken = $helper->getAccessToken();
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            $twigVar['error'] = true;echo '1Graph returned an error: ' . $e->getMessage();
  exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            $twigVar['error'] = true;echo '2Graph returned an error: ' . $e->getMessage();
  exit;
        }
        if($twigVar['error'])
            return $this->view->render($response, 'login.html', $twigVar);

        if (isset($accessToken)) {
            // Logged in!
            $_SESSION['facebook_access_token'] = (string) $accessToken;
            $oAuth2Client = $fb->getOAuth2Client();
            $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
            $fb->setDefaultAccessToken($accessToken);
            try {
                $fbResponse = $fb->get('/me?fields=id,name,email');
                $userNode = $fbResponse->getGraphUser();
            } catch(Facebook\Exceptions\FacebookResponseException $e) {
                $twigVar['error'] = true;echo '3Graph returned an error: ' . $e->getMessage();
  exit;
            } catch(Facebook\Exceptions\FacebookSDKException $e) {
                $twigVar['error'] = true;echo '4Graph returned an error: ' . $e->getMessage();
  exit;
            }
            if($twigVar['error'])
                return $this->view->render($response, 'login.html', $twigVar);
            
            $facebookUserId = $userNode->getId();
            $user = NormalUserQuery::create()->findByFacebookId($facebookUserId);
            if($user == null || $user->count() != 1){
                $user = new NormalUser();
                $user->setUsername($userNode->getName());
                $user->setEmail($userNode->getProperty('email'));
                $user->setPassword($userNode->getId());
                $user->setFacebookId($userNode->getId());
                $user->save();
            }
            if($user->count() == 1){
                $user = $user[0];
            }
            Core::loginUser($user);
            $response = $response->withStatus(302)->withHeader('Location', $this->router->pathFor(HdbCore::ROLE_GUEST.'#public@redirect'));
            return $response;
        }
    })->setName(HdbCore::ROLE_GUEST.'#guest@login.facebook');
    
    $this->get('/appbox-facebook/{id}', function ($request, $response, $args){
        $facebookUserId = $args["id"];
        $user = NormalUserQuery::create()->findByFacebookId($facebookUserId);
        if($user == null || $user->count() != 1){
            $user = new NormalUser();
            $user->setUsername($userNode->getName());
            $user->setEmail($userNode->getProperty('email'));
            $user->setPassword($userNode->getId());
            $user->setFacebookId($userNode->getId());
            $user->save();
        }else if($user->count() == 1){
            $user = $user[0];
        }
        Core::loginUser($user);
        $response = $response->withStatus(302)->withHeader('Location', $this->router->pathFor(HdbCore::ROLE_GUEST.'#public@redirect'));
        return $response;
    })->setName(HdbCore::ROLE_GUEST.'#guest@login.appbox-facebook');
    
    $this->map(['get', 'post'], '/register/user', function ($request, $response, $args){
        $twigVar = ['title' => 'Login', 'error' => false, 'msg' => ''];
        if($request->isPost()){
            $params = $request->getParsedBody();
            $user = null;
            $user = UserQuery::create()->findOneByEmail($params['email']);
            if($user !== null){
                $twigVar['error'] = true;
                $twigVar['msg'] = 'Email is registered. Please login.';
                return $this->view->render($response, 'register-normal-user.html', $twigVar);
            }
            $user = UserQuery::create()->findOneByUsername($params['username']);
            if($user !== null){
                $twigVar['error'] = true;
                $twigVar['msg'] = 'Username is registered. Please try another username.';
                return $this->view->render($response, 'register-normal-user.html', $twigVar);
            }
            $user = new NormalUser();
            $user->setEmail($params['email']);
            $user->setPassword(Core::createHashing($params['password']));
            $user->setUsername($params['username']);
            $user->save();
            Core::loginUser($user);
            $response = $response->withStatus(302)->withHeader('Location', $this->router->pathFor(HdbCore::ROLE_GUEST.'#public@redirect'));
            return $response;
        }
//        $fb = new Facebook\Facebook([
//            'app_id' => '495795723943655',
//            'app_secret' => '40fdfb983ee2429e01c3bf3ad7080aa4',
//            'default_graph_version' => 'v2.5',
//        ]);
//        $helper = $fb->getRedirectLoginHelper();
//        $permissions = ['email']; // optional
//        $loginUrl = $helper->getLoginUrl('http://hdb.local/guest/facebook', $permissions);
        $loginUrl = 'http://hdb.appbox.com.my/login.php';
        $twigVar['facebook'] = $loginUrl;
        return $this->view->render($response, 'register-normal-user.html', $twigVar);
    })->setName(HdbCore::ROLE_GUEST.'#guest@register.normalUser');
    
    $this->map(['get', 'post'], '/register/realtor', function ($request, $response, $args){
        $twigVar = ['title' => 'Login', 'error' => false, 'msg' => ''];
        if($request->isPost()){
            $params = $request->getParsedBody();
            $user = null;
            $user = UserQuery::create()->findOneByEmail($params['email']);
            if($user !== null){
                $twigVar['error'] = true;
                $twigVar['msg'] = 'Email is registered. Please login.';
                return $this->view->render($response, 'register-realtor.html', $twigVar);
            }
            $user = UserQuery::create()->findOneByUsername($params['username']);
            if($user !== null){
                $twigVar['error'] = true;
                $twigVar['msg'] = 'Username is registered. Please try another username.';
                return $this->view->render($response, 'register-realtor.html', $twigVar);
            }
            $user = new Realtor();
            $user->setEmail($params['email']);
            $user->setPassword(Core::createHashing($params['password']));
            $user->setUsername($params['username']);
            $user->setContactNumber($params['contact']);
            $user->setNric($params['nric']);
            $user->setFullName($params['fullname']);
            $user->save();
            Core::loginUser($user);
            $response = $response->withStatus(302)->withHeader('Location', $this->router->pathFor(HdbCore::ROLE_GUEST.'#public@redirect'));
            return $response;
        }
        return $this->view->render($response, 'register-realtor.html', $twigVar);
    })->setName(HdbCore::ROLE_GUEST.'#guest@register.realtor');
    
    $this->get('/logout', function ($request, $response, $args){
        if($user != false){
            $currentSession = LoginSessionQuery::create()->filterByUserId($this->cms->getUser()->getId())
                                                         ->filterByUserType(get_class($this->cms->getUser()))
                                                         ->filterByDisabled(false)
                                                         ->findOne();
            if($currentSession != false){
                $currentSession->setDisabled(true);
                $currentSession->save();
            }
        }
        session_destroy();
        $response = $response->withStatus(302)->withHeader('Location', $this->router->pathFor(HdbCore::ROLE_GUEST.'#public@redirect'));
        return $response;
    })->setName(HdbCore::ROLE_GUEST.'#public@login.logout');
});