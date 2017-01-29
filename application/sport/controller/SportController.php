<?php
namespace app\sport\controller;

use think\Request;

use app\common\controller\BaseController;
use app\sport\model\SportCategory;
use app\sport\model\Sport;

class SportController extends BaseController
{
	public function index(){
		return "index";
	}



	public function categories() {
		$result = ["retCode" => "0", "retMsg" => "OK"];
		$request = Request::instance();

		try {
			$model = new SportCategory();
			$list = $model->select();
			foreach ($list as $key => &$value) {
				$value['img_url'] = $request->domain() . $value['img_url'];
			}

			$result['data'] = $list;
			
		}catch(Exception $e){
			$result['retCode'] = "1";
			$result['retMsg'] = "query error";
		}
		

		//return json_encode($result, true);
		echo json_encode($result, true);
		exit(0);
		
	}

	public function getSportByCategoryId($cid = 0, $count = 10, $page = 1) {
		$result = ["retCode" => "0", "retMsg" => "OK"];
		$request = Request::instance();
		try {
			$sport = new Sport();
			$offset = ($page - 1) * $count;
			$list = $sport->where(["category_id" => $cid])->limit($offset, $count)->select();

			foreach ($list as $key => &$value) {
				$value['img_url'] = $request->domain() . $value['img_url'];
			}

			$result['data'] = $list;

		} catch (Exception $e) {
			$result['retCode'] = "1";
			$result['retMsg'] = "query error";
		}

		//return json_encode($result, true);
		echo json_encode($result, true);
		exit(0);
	}


	public function getSportById($id = 0) {

		$result = ["retCode" => "0", "retMsg" => "OK"];
		$request = Request::instance();
		try {
			$sport = new Sport();
			
			$list = $sport->where(["id" => $id])->find();

			foreach ($list as $key => &$value) {
				$value['img_url'] = $request->domain() . $value['img_url'];
			}

			$result['data'] = $list;

		} catch (Exception $e) {
			$result['retCode'] = "1";
			$result['retMsg'] = "query error";
		}

		//return json_encode($result, true);

		echo json_encode($result, true);
		exit(0);
	}


}