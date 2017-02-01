<?php
namespace app\news\controller;

use think\Request;

use app\common\controller\BaseController;
use app\news\model\News;
class NewsController extends BaseController{


	public function getNewsById($id = 0)
	{
		

		$result = ["retCode" => "0", "retMsg" => "OK"];
		$request = Request::instance();

		try {
			$news = new News();
			$item = $news->where(['id' => $id])->find();
			$item['imgurl'] = $request->domain() . $item['imgurl'];

			$result['data'] = $item;
			
		}catch(Exception $e){
			$result['retCode'] = "1";
			$result['retMsg'] = "query error";
		}
		echo json_encode($result);
		exit(0);
	}


	public function getList($type = null, $count = 10, $page = 1) 
	{
		$result = ["retCode" => "0", "retMsg" => "OK"];
		$request = Request::instance();
		try {
			$news = new News();
			$offset = ($page - 1) * $count;

			if($type){
				$news->where(['type' => $type]);
			}

			$list = $news->limit($offset, $count)->field("id,title,type,addtime,source,summary,imgurl")->select();

			foreach ($list as $key => &$value) {
				$value['imgurl'] = $request->domain() . $value['imgurl'];
			}

			$result['data'] = $list;

		} catch (Exception $e) {
			$result['retCode'] = "1";
			$result['retMsg'] = "query error";
		}


		echo json_encode($result);
		exit(0);
	}

}