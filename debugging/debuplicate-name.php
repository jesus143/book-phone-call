<?php

$data = [
    ['namesss' => 'SAMUEL, David rich', 'officer_role' => 'secretary'],
    ['namesss' => 'SAMUEL, Lyndsay Jayne', 'officer_role' => 'Company Director'],
    ['namesss' => 'SAMUEL, Amazing Jayne', 'officer_role' => 'secretary'],
    ['namesss' => 'SAMUEL, Amazing Ramos', 'officer_role' => 'Director'],
];
print_r(bpc_removeDuplicateIfNotDirector($data));
function bpc_removeDuplicateIfNotDirector($data)
{
// remove duplicates

    $data1 = $data;
    $name = '';
    $lenStr2 = count($data1);
    $finalData = [];
    $isAddNewName = true;
    $officerRole = '';
    $officerRole1 = '';
    foreach ($data as $key => $value) {
        $name = bpc_to_plain_str($value['namesss']);
        $officerRole = $value['officer_role'];
        print "\n full name " . $key . ' ' . $name;
        for ($i = $key + 1; $i < count($data1); $i++) {
            if ($i < $lenStr2) {
                $officerRole1 = $value['officer_role'];
                $name1 = bpc_to_plain_str($data1[$i]['namesss']);
                if ($name == $name1) {
                    $data = bpc_removeNoneDirectorDuplicate($data, $officerRole, $i, $key);
                    $isAddNewName = false;
                    print "equal str";
                    break;
                }
            }
        }
    }
//    print_r($data);


    $data1=[];
    foreach($data as $key => $value) {
        $data1[] = $value;
    }

    return $data;

}
function bpc_removeNoneDirectorDuplicate($data, $officerRole, $i, $key) {
    $officerRole = strtolower($officerRole);
    if(strpos($officerRole, 'director') > -1) {
        unset($data[$i]);
        // yes
    } else{
        unset($data[$key]);
    }
    return $data;
}
function bpc_to_plain_str($name) {
    $name = bpc_getFullName($name);
    $name = bpc_mergeAllString($name);
    $name = bpc_toLowerCaseStr($name);
    return $name;
}
function bpc_mergeAllString($str) {
    return str_replace(" ", "", $str);
}
function bpc_toLowerCaseStr($str) {
    return strtolower($str);
}
function bpc_getFullName($name) {
    $firstName = '';
    $lastName = '';
    $lastName = explode(',', $name)[0];
    if(count(explode(',', $name)) > 1) {
        $firstName = explode(',', $name)[1];

        $firstName = trim($firstName, " ");

        $firstNameArr = explode(" ", $firstName);

        if(count($firstNameArr) > 0) {
            $firstName = $firstNameArr[0];
        }
    }
    return $lastName . ', ' . $firstName;
}