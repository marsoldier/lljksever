<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    'sport/categories' => 'sport/sport/categories',
    'sport/:cid/:page/[:count]' => ['sport/sport/getSportByCategoryId', ['cid' => '\d+', 'page' => '\d+', 'count' => '\d+']],
    'sport/:id' => ['sport/sport/getSportById', ['id' => '\d+']],


];
