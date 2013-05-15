<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 13-5-8
 * Time: 下午10:28
 * To change this template use File | Settings | File Templates.
 */

class WeixinWidget extends Widget{
    public function render($data)
    {

        return '';
    }
    public function weixin()
    {
        //echo C("WEIXIN_TOKEN");exit;
       // header("content-type:text/xml;");
        //$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];// file_get_contents("php://input");
        //$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        //$this->valid();
        //   header("Content-type: text/xml");

        $this->handleMessage();

    }

    public function valid()
    {
        $echoStr = $_GET["echostr"];
        if ($this->checkSignature()) {

            echo $echoStr;
            exit;
        }
    }

    public function handleMessage()
    {
       $postStr = isset($GLOBALS['HTTP_RAW_POST_DATA']) ? $GLOBALS['HTTP_RAW_POST_DATA'] : file_get_contents("php://input");
       //dump(C('WEIXIN.WEIXIN_TOKEN'));exit;

        //D('Weixin','mag')->get();
        if (!empty($postStr)) {
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $resultStr = D('Weixin','mag')->handle($postObj);
            if (!empty($resultStr)) {
                echo $resultStr;
            } else {
                $conf = C('WEIXIN');
                echo D('Weixin','mag')->buildTpl($conf['error']['empty_return']['data'],
                    $conf['error']['empty_return']['type']);
            }

        } else {
            echo "错误的指令格式。";
            exit;
        }
    }

    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $token = C('WEIXIN.WEIXIN_TOKEN');
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);

        if ($tmpStr == $signature) {
            return true;
        } else {
            return false;
        }
    }
}