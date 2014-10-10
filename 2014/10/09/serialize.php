<?php
/**
 *serialize
 */
$str = 'subscribe:O:6:"Wechat":15:{s:13:"Wechattoken";s:31:"7F9A2E4861124BFDE246CBC4E38C4F6";s:13:"Wechatappid";s:18:"wx5eb372d8827ddfc7";s:17:"Wechatappsecret";s:32:"c1de582f026353990a970a50f6824023";s:20:"Wechataccess_token";N;s:18:"Wechatuser_token";N;s:17:"Wechatpartnerid";s:0:"";s:18:"Wechatpartnerkey";s:0:"";s:18:"Wechatpaysignkey";s:0:"";s:12:"Wechat_msg";N;s:17:"Wechat_funcflag";b:0;s:16:"Wechat_receive";a:7:{s:10:"ToUserName";s:15:"gh_c97e9a456caa";s:12:"FromUserName";s:28:"oOBWIjn_bclWpTDXupCLsoQytRUo";s:10:"CreateTime";s:10:"1412848613";s:7:"MsgType";s:5:"event";s:5:"Event";s:9:"subscribe";s:8:"EventKey";s:9:"qrscene_1";s:6:"Ticket";s:96:"gQFi8DoAAAAAAAAAASxodHRwOi8vd2VpeGluLnFxLmNvbS9xL1QzWGt3OFRtMGdfcjk4aDcybG44AAIEACs2VAMEAAAAAA==";}s:5:"debug";b:0;s:7:"errCode";i:40001;s:6:"errMsg";s:9:"no access";s:20:"Wechat_logcallback";b:0;}
2014/10/09 17:57:20 [wxservice] [weixin] SCAN:O:6:"Wechat":15:{s:13:"Wechattoken";s:31:"7F9A2E4861124BFDE246CBC4E38C4F6";s:13:"Wechatappid";s:18:"wx5eb372d8827ddfc7";s:17:"Wechatappsecret";s:32:"c1de582f026353990a970a50f6824023";s:20:"Wechataccess_token";N;s:18:"Wechatuser_token";N;s:17:"Wechatpartnerid";s:0:"";s:18:"Wechatpartnerkey";s:0:"";s:18:"Wechatpaysignkey";s:0:"";s:12:"Wechat_msg";N;s:17:"Wechat_funcflag";b:0;s:16:"Wechat_receive";a:7:{s:10:"ToUserName";s:15:"gh_c97e9a456caa";s:12:"FromUserName";s:28:"oOBWIjn_bclWpTDXupCLsoQytRUo";s:10:"CreateTime";s:10:"1412848640";s:7:"MsgType";s:5:"event";s:5:"Event";s:4:"SCAN";s:8:"EventKey";s:1:"1";s:6:"Ticket";s:96:"gQFi8DoAAAAAAAAAASxodHRwOi8vd2VpeGluLnFxLmNvbS9xL1QzWGt3OFRtMGdfcjk4aDcybG44AAIEACs2VAMEAAAAAA==";}s:5:"debug";b:0;s:7:"errCode";i:40001;s:6:"errMsg";s:9:"no access";s:20:"Wechat_logcallback";b:0;}';


$obj = unserialize($str);

var_dump($obj);

