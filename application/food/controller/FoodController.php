<?php
namespace app\food\controller;
use app\common\controller\BaseController;

use app\food\model\FoodCategory;
use app\food\model\Food;
use app\food\model\MeasureMethod;
use app\food\model\NutritionInfo;

use think\Request;


class FoodController extends BaseController{

	public function foodCategories()
	{

		$result = ["retCode" => "0", "retMsg" => "OK"];

		try {

			$category = new FoodCategory();
			$list = $category->select();
			
			$request = Request::instance();
			$domain  = $request->domain();

			foreach ($list as $key => &$value) {
				$value['img_url'] = $domain . $value['img_url'];
			}

			$result['data'] = $list;

		}catch(Exception $e){
			$result['retCode'] = "1";
			$result['retMsg'] = "query error";
		}
		

		echo json_encode($result);
		exit(0);

	}



	public function getFoodById($id = 0)
	{
		$result = ["retCode" => "0", "retMsg" => "OK"];

		try {

			$db = new Food();
			$food = $db->where(['id' => $id])->find();

			$request = Request::instance();
			$domain  = $request->domain();

			$food['large_img_url'] = $domain . $food['large_img_url'];
			$food['mid_img_url'] = $domain . $food['mid_img_url'];
			$food['small_img_url'] = $domain . $food['small_img_url'];

			$mm = new MeasureMethod();
			$measures = $mm->where(['food_id' => $id])->select();


			$ni = new NutritionInfo();
			$nutritions = $ni->where(['food_id' => $id])->select();

			$food['measures'] = $measures;
			$food['nutritions'] = $nutritions;

			$result['data'] = $food;

		}catch(Exception $e){
			$result['retCode'] = "1";
			$result['retMsg'] = "query error";
		}
		

		echo json_encode($result);
		exit(0);
	}

	public function getFoodListByCategoryId($cid = 0, $page = 1, $count = 10)
	{
		$result = ["retCode" => "0", "retMsg" => "OK"];
		$request = Request::instance();
		try {
			$food = new Food();
			$offset = ($page - 1) * $count;


			$list = $food->where(['category_id' => $cid])->limit($offset, $count)->field("id,name, alias,caloric, caloric_unit, weight, weight_unit, small_img_url")->select();

			foreach ($list as $key => &$value) {
				$value['small_img_url'] = $request->domain() . $value['small_img_url'];
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