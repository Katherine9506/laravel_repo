<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019\3\2 0002
 * Time: 0:56
 */

namespace App\Http\Controllers;

use App\models\Fibonacci;
use App\models\RedBlackTree;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $test = [12, 550, 300, 20, 1, 50, 44, 34, 24, 31];

        $testH = [12, 550, 300, 20, 1, 50, 44, 34, 24, 25, 79, 19, 99];

        $start = time();

        $tree = new RedBlackTree();

        foreach ($test as $value) {
            if ($tree->Insert($value)) {
            }
        }

        $tree->MidOrder();

        $end = time();

        //=================================================

//        $start = time();
//
//        $tree = new RedBlackTree();
//
//        for ($i = 0; $i < 200000;) {
//            $r = mt_rand(1000000, 9999999);
//            if ($tree->insert($r)) {
//                $i++;
//            }
//        }
//
//        $end = time();
//
////        $tree->MidOrder();
//
//
        echo '总共花费' . ($end - $start);

        echo '树深度' . $tree->Depth();
    }

    /**
     * 斐波那契数列
     * @param Request $request
     * @return array
     */
    public function fibonacci(Request $request)
    {
        $n = $request->get('n', 0);
        $arr = Fibonacci::generate($n);
        $avgs = collect(array_chunk($arr, 3));

        tap($avgs, function ($value) {
            foreach ($value as $key => $item) {
                $value[$key] = $this->getAvg($item);
            }
        });

        $tree = new RedBlackTree();
        $max = $arr[count($arr) - 1];
        foreach ($avgs as $avg) {
            for (; ;) {
                if ($tree->Insert($avg + mt_rand(0, $max))) {
                    break;
                }
            }
        }
        dd($tree->MidOrder());

        return compact('arr', 'avgs');
    }

    private function getAvg(array $args)
    {
        $sum = 0;
        foreach ($args as $arg) {
            $sum = $sum + $arg;
        }
        return round($sum / count($args));
    }

}
