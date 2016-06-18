<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class MainController extends Controller {


    //Function that generate an array data with the solution
    public function showResult()
    {

        //call to private function
        $data = $this->solution();

        //pass array result as parameter to result.php view
        return view('result')->with('data',$data);
    }


    //function that resolve the cube summation problem - retrieved from https://www.hackerrank.com/challenges/cube-summation
    private function solution()
    {

        //load input from input file
        $input_file = fopen("./input.txt", "r");

        $ulist = array();
        $input = array();
        $output = array();
        $result = array();

        if ($input_file) 
        {
            //first input read
            $T = (int)fgets($input_file);
            $input[] = $T;

            for ($i = 0; $i < $T; $i++) 
            {
                //second read
                $line = fgets($input_file);
                $input[] = $line;
                //get coordinates
                $split_line = explode(" ", $line);

                $N = (int)$split_line[0];
                $M = (int)$split_line[1];

                for ($j = 0; $j < $M; $j++) 
                { 
                    $line_oper = fgets($input_file);
                    $input[] = $line_oper;
                    $split_line_oper = explode(" ", $line_oper);
                    $type = $split_line_oper[0];

                    $x1 = (int)$split_line_oper[1];
                    $y1 = (int)$split_line_oper[2]; 
                    $z1 = (int)$split_line_oper[3]; 

                    //get instructions
                    if ($type === "UPDATE")
                    {
                        $index = $this->contained($ulist, $x1, $y1, $z1);
                        $W = (int)$split_line_oper[4];
                        if ($index != -1) 
                        {
                            unset($ulist[$index]);
                        }
                        
                        $item = array();
                        $item[] = $x1;
                        $item[] = $y1;
                        $item[] = $z1;
                        $item[] = $W;
                        $ulist[] = $item;
                    }else
                    {
                        $x2 = (int)$split_line_oper[4];
                        $y2 = (int)$split_line_oper[5]; 
                        $z2 = (int)$split_line_oper[6]; 
                    
                        $sum = 0;

                        foreach ($ulist as $item) 
                        {
                            if ($x1 <= $item[0] && $y1 <= $item[1] && $z1 <= $item[2] && $item[0] <= $x2 && $item[1] <= $y2 && $item[2] <= $z2)
                                $sum += 1 * $item[3];
                        }

                        $output[] = $sum;

                    }

                }

                $ulist = array();
            }

            fclose($input_file);
        } else {
            echo 'Error opening file'; die();
        } 

        $result["input"] = $input;
        $result["output"] = $output;

        //return final result
        return $result;

    }

    //function that return the array index if result contains coordinates
    private function contained(&$ulist, $x1, $y1, $z1) 
    {
        $size = COUNT($ulist);

        for ($i = 0; $i < $size; $i++) {
            
            if ($ulist[$i][0] == $x1 && $ulist[$i][1] == $y1 && $ulist[$i][2] == $z1)
                return $i;
        }
        return -1;

    }

}