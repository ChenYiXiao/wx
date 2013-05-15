<?php
$weixin = array(
    'WEIXIN' => array(
        'SITE_PATH'=>'/ts0413',//网站根目录，用于支持形如www.vitvb.com/ts0413这种子目录形式的网站微信和客户端
        'WEIXIN_TOKEN' => 'vitvb', //微信TOKEN
        //指令集合，请不要随便修改。如需修改，请到下面同时修改提示信息
        'mag' => 'a',
        'issue' => 'b',
        'content' => 'c',
        'home' => 'h',

        //以下是微信官方的事件代码
        'sub' => 'subscribe', //关注事件的keyword
        'r_sub' => 'text', //关注事件的响应类型
        'r_sub_data' => array(
            'content' => '欢迎关注TVB公馆小报。
回复以下以下指令即可得到您想要的服务：
h 浏览我们为您准备的精美首页;
a 浏览最新的小报;
b 浏览最新的期;
c 浏览最新的内容;
ai、bi、ci加上ID即可得到指定的小报、期或者内容。
——微信自动回复还在测试开发阶段,敬请期待。',
        ),


        'error' => array(
            'no_text' => array(
                'data' => array(
                    'content' => '抱歉，此指令暂未支持。
回复以下以下指令即可得到您想要的服务：
h 浏览我们为您准备的精美首页;
a 浏览最新的小报;
b 浏览最新的期;
c 浏览最新的内容;
ai、bi、ci加上ID即可得到指定的小报、期或者内容。
——TVB公馆小报',
                ),
                'type' => 'text'),
            'empty_return' => array(
                'data' => array(
                    'content' => '没有数据返回。可能是系统内部错误。你发送的消息已经记录，谢谢。',
                    'flag' => '1'),
                'type' => 'text')

        ),

        //以下是微信各类模板的变量
        //文本模板
        'textTpl' => "<xml>
                            <ToUserName><![CDATA[{toUser}]]></ToUserName>
                            <FromUserName><![CDATA[{fromUser}]]></FromUserName>
                            <CreateTime>{time}</CreateTime>
                            <MsgType><![CDATA[text]]></MsgType>
                            <Content><![CDATA[{content}]]></Content>
                            <FuncFlag>{flag}</FuncFlag>
                            </xml>",
        //图文模板
        'newsTpl' => array(
            'tpl' => " <xml>
                            <ToUserName><![CDATA[{toUser}]]></ToUserName>
                            <FromUserName><![CDATA[{fromUser}]]></FromUserName>
                            <CreateTime>{time}</CreateTime>
                            <MsgType><![CDATA[news]]></MsgType>
                            <ArticleCount>{articles_num}</ArticleCount>
                            <Articles>
                            {articles}
                            </Articles>
                            <FuncFlag>{flag}</FuncFlag>
                            </xml>
                             ",
            'articles' => '<item>
                            <Title><![CDATA[{title}]]></Title>
                            <Description><![CDATA[{description}]]></Description>
                            <PicUrl><![CDATA[{picurl}]]></PicUrl>
                            <Url><![CDATA[{url}]]></Url>
                            </item>'
        )
    )

);