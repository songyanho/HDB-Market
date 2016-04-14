<?php
if (!defined('IN_CORE_SYSTEM')){die('INVALID DIRECT ACCESS');}

$app->group('/data', function(){
    $this->get('/update-hdb', function ($request, $response, $args){
        set_time_limit(0);
        $results = file_get_contents('https://data.gov.sg/api/action/datastore_search?resource_id=83b2fc37-ce8c-4df4-968b-370fd818138b&limit=1');
        $obj = json_decode($results, true);
        $total = $obj["result"]["total"];
        for($i=0; $i<ceil($total/10000); $i++){
            echo 'https://data.gov.sg/api/action/datastore_search?resource_id=83b2fc37-ce8c-4df4-968b-370fd818138b&limit=10000&offset='.($i*10000).'<br />';
            $results = file_get_contents('https://data.gov.sg/api/action/datastore_search?resource_id=83b2fc37-ce8c-4df4-968b-370fd818138b&limit=10000&offset='.($i*10000));
            $obj = json_decode($results, true);
            $records = $obj["result"]["records"];
            foreach($records as $v){
                $hdb = HdbQuery::create()->filterByBlock($v["block"])->filterByFlatType($v["flat_type"])->filterByTown($v["town"])->filterByStreet($v["street_name"])->filterByFlatModel($v["flat_model"])->find();
                if($hdb->count() > 0)
                    continue;
                $hdb = new Hdb();
                $hdb->setBlock($v["block"]);
                $hdb->setFlatType($v["flat_type"]);
                $hdb->setTown($v["town"]);
                $hdb->setStreet($v["street_name"]);
                $hdb->setFlatModel($v["flat_model"]);
                $hdb->save();
            }
            echo "Done Round ".($i+1)." of total ".ceil($total/10000)."<br />";
        }
        echo "Done";
    })->setName(HdbCore::ROLE_GUEST.'#public@data.updateHdbCore');
});