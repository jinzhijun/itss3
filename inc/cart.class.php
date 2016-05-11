<?php
/**
 * 购物车类 Cookies 保存，保存周期为1天 注意：浏览器必须支持Cookie才能够使用
 * 技术交流群：100352308
 */
class CartAPI {
	private $CartArray = array(); // 存放购物车的二维数组
	private $CartCount; // 统计购物车数量
	public $Expires = 86400; // Cookies过期时间，如果为0则不保存到本地 单位为秒
	/**
	 * 构造函数 初始化操作 如果$Id不为空，则直接添加到购物车
	 *
	 */
	public function __construct($Id = "",$Image = "",$Name = "",$Price = "",$Count = "",$Expires = 86400) {
		if ($Id != "" && is_numeric($Id)) {
			$this->Expires = $Expires;
			$this->addCart($Id,$Image,$Name,$Price,$Count);
		}
	}
	/**
	 * 添加商品到购物车
	 *
	 * @param int $Id 商品的编号
	 * @param string $Name 商品名称
	 * @param decimal $Price1 商品价格
	 * @param decimal $Price2 商品价格
	 * @param decimal $Price3 商品价格
	 * @param int $Count 商品数量
	 * @param string $Image 商品图片
	 * @return 如果商品存在，则在原来的数量上加1，并返回false
	 */
	public function addCart($Id,$Image,$Name,$Price,$Count) {
		$this->CartArray = $this->CartView(); // 把数据读取并写入数组
		if ($this->checkItem($Id)) { // 检测商品是否存在
			$this->ModifyCart($Id,$Count,0); // 商品数量加$Count
			return false;
		}
		$this->CartArray[0][$Id] = $Id;
		$this->CartArray[1][$Id] = $Image;
		$this->CartArray[2][$Id] = $Name;
		$this->CartArray[3][$Id] = $Price;
		$this->CartArray[4][$Id] = $Count;
		$this->save();
	}
	/**
	 * 修改购物车里的商品
	 *
	 * @param int $Id 商品编号
	 * @param int $Count 商品数量
	 * @param int $Flag 修改类型 0：加 1:减 2:修改 3:清空
	 * @return 如果修改失败，则返回false
	 */
	public function ModifyCart($Id, $Count, $Flag = "") {
		$tmpId = $Id;
		$this->CartArray = $this->CartView(); // 把数据读取并写入数组
		$tmpArray = &$this->CartArray;  // 引用
		if (!is_array($tmpArray[0])) return false;
		if ($Id < 1) {
			return false;
		}
		foreach ($tmpArray[0] as $item) {
			if ($item === $tmpId) {
				switch ($Flag) {
					case 0: // 添加数量 一般$Count为1
						//$tmpArray[4][$Id] += $Count;
						$tmpArray[4][$Id]=1;
						break;
					case 1: // 减少数量
						$tmpArray[4][$Id] -= $Count;
						break;
					case 2: // 修改数量
						if ($Count == 0) {
							unset($tmpArray[0][$Id]);
							unset($tmpArray[1][$Id]);
							unset($tmpArray[2][$Id]);
							unset($tmpArray[3][$Id]);
							unset($tmpArray[4][$Id]);
							break;
						} else {
							$tmpArray[4][$Id] = $Count;
							break;
						}
					case 3: // 清空商品
						unset($tmpArray[0][$Id]);
						unset($tmpArray[1][$Id]);
						unset($tmpArray[2][$Id]);
						unset($tmpArray[3][$Id]);
						unset($tmpArray[4][$Id]);
						break;
					default:
						break;
				}
			}
		}
		$this->save();
	}
	/**
	 * 清空购物车
	 *
	 */
	public function RemoveAll() {
		$this->CartArray = array();
		$this->save();
	}
	/**
	 * 查看购物车信息
	 *
	 * @return array 返回一个二维数组
	 */
	public function CartView() {
		$cookie = stripslashes($_COOKIE['CartAPI']);
		if (!$cookie) return false;
		$tmpUnSerialize = unserialize($cookie);
		return $tmpUnSerialize;
	}
	/**
	 * 检查购物车是否有商品
	 *
	 * @return bool 如果有商品，返回true，否则false
	 */
	public function checkCart() {
		$tmpArray = $this->CartView();
		if (count($tmpArray[0]) < 1) {			
			return false;
		}
		return true;
	}
	/**
	 * 商品统计
	 *
	 * @return array 返回一个一维数组 $arr[0]:产品1的总价格 $arr[1:产品2得总价格 $arr[2]:产品3的总价格 $arr[3]:产品的总数量
	 */
	public function CountPrice() {
		$tmpArray = $this->CartArray = $this->CartView();
		$outArray = array(); //一维数组
		// 0 是产品的总价格
		// 3 是产品的总数量
		$i = 0;
		if (is_array($tmpArray[0])) {
			foreach ($tmpArray[0] as $key=>$val) {
				$outArray[0] += $tmpArray[3][$key] * $tmpArray[4][$key];
				$outArray[1] += $tmpArray[4][$key];
				$i++;
			}
		}
		return $outArray;
	}
	/**
	 * 统计商品数量
	 *
	 * @return int
	 */
	public function CartCount() {
		$tmpArray = $this->CartView();
		$tmpCount = count($tmpArray[0]);
		$this->CartCount = $tmpCount;
		return $tmpCount;
	}
	/**
	 * 保存商品 如果不使用构造方法，此方法必须使用
	 *
	 */
	public function save() {
		$tmpArray = $this->CartArray;
		$tmpSerialize = serialize($tmpArray);
		setcookie("CartAPI",$tmpSerialize,time()+$this->Expires);
	}
	/**
	 * 检查购物车商品是否存在
	 *
	 * @param int $Id
	 * @return bool 如果存在 true 否则false
	 */
	private function checkItem($Id) {
		$tmpArray = $this->CartArray;
		if (!is_array($tmpArray[0])) return;
		foreach ($tmpArray[0] as $item) {
			if ($item === $Id) return true;
		}
		return false;
	}
}
?>