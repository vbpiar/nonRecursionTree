<?php

$test_array = [
    ['id'=>1,'name'=>'Jhon','parent_id'=>0],
    ['id'=>2,'name'=>'Mike','parent_id'=>1],
    ['id'=>3,'name'=>'Den','parent_id'=>1],
    ['id'=>4,'name'=>'Ivan','parent_id'=>2],
    ['id'=>5,'name'=>'Taras','parent_id'=>3],
    ['id'=>6,'name'=>'Olga','parent_id'=>4],
    ['id'=>7,'name'=>'Darya','parent_id'=>5],
    ['id'=>8,'name'=>'Viktoriya','parent_id'=>0],

];


function makeTree(&$input_array) {

    $map = [
        0 =>['catalog' => []]
    ];

    foreach ($input_array as &$category) {
        $category['catalog'] = []; //create array for children that we append later
        $map[$category['id']] = &$category; // add reference to created category
    }

    foreach ($input_array as &$category) {
        $map[$category['parent_id']]['catalog'][] = &$category; // add reference all children to created category 
    }
    return $map[0]['catalog'];

}



$tree = makeTree($test_array);

print_r ($tree);
