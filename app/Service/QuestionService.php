<?php

namespace App\Service;


use App\Model\Questions;

class QuestionService
{
    public static function getQuestionList($data = [])
    {
        $result = array('code' => 0,  'msg' => '', 'data' => array());

        // 查询数据
        $param = [];
        $order = array('id' , 'desc');
        $user_list = Questions::getListByParam($param, $data['page'], $data['limit'], null, $order);
        $total = Questions::getCntByParam($param);

        // return
        $result['data'] = $user_list;
        $result['count'] = $total;
        return $result;
    }
}
