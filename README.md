# BiliBili_Danmu_query<br />
BiliBili弹幕发送者查询。<br />
使用方法：<br />
0x01<br />
生成彩虹表：“php -f maketable.php minUID maxUID”<br />
minUID为生成区间始，maxUID为生成区间末。<br />
字典格式为“CRC32b.UID”，按照CRC32B的前三位分割排列至./hashtable目录<br />
0x03<br />
部署和查询：<br />
待更新。<br />


# API使用说明




## API名：视频信息获取

####描述

传入aid（av号），获取投稿的封面、名称、UP主、分P、分P标题、cid等

----
####调用URL

https://api.nksec.cn/bilibili/getinfo.php

----
####调用方法

POST

----
####请求体格式

无限制

----

####请求参数


| 是否必选 | 参数名   |  类型  | 参数说明|
| :-----: | :-----: | :----:  | :----:|
| 是      | aid   |   String  | 投稿的aid(av号) |

----
####返回值说明
|    字段  |     类型    |     说明 |
| :--------:  | :-----: | :--------: |
|   picurl  |   String  |   封面图url |
|  uploader |   Array   |  UP主相关信息 | 
|  video   |  Int      |   投稿分P数量  |
|   title   |   String   |   投稿标题  |
|   part    |   Array    | 投稿的分P信息 |

----

####返回值中uploader数组说明
| 字段 | 类型 | 说明 |
| :--------: |:-----: | :--------: |
| mid | Int | Up主uid |
| name | String | Up主昵称 |
| face | String | Up主头像的url |

----

###返回值示例
####请求成功返回示例
```json
[{
	"picurl": "http:\/\/i1.hdslb.com\/bfs\/archive\/35d5a0fa8b79474d211d305dea76eac78ceb423c.jpg",
	"uploader": {
		"mid": 478206242,
		"name": "\u5fb7\u4e91\u76f8\u58f0tv",
		"face": "http:\/\/i1.hdslb.com\/bfs\/face\/a67bb47e6c830cc7e3968d99249817801a1303df.jpg"
	},
	"video": 2,
	"title": "\u3010\u5fb7\u4e91\u76f8\u58f0\u3011\u90ed\u5fb7\u7eb2\u4e8e\u8c26\u300a\u5077\u65a7\u5b50\u300b2p\u5168",
	"part": [{
		"name": "\u3010\u5fb7\u4e91\u76f8\u58f0\u3011\u90ed\u5fb7\u7eb2\u4e8e\u8c26\u300a\u5077\u65a7\u5b50\u300b2p\u5168",
		"cid": 152603296
	}, {
		"name": "1581821920865",
		"cid": 152611253
	}]
}]
```
请求失败返回示例
```json
Null
```
调用示例
```json
无
```


## API名：弹幕获取

####描述

传入cid，获取该视频下的弹幕

----
####调用URL

https://api.nksec.cn/bilibili/getdanmu.php

----
####调用方法

POST

----
####请求体格式

无限制

----

####请求参数


|    是否必选 | 参数名   |  类型  | 参数说明 |
|  :--------:  | :-----: | :----: | :----: |
|       是    |   cid   |  String | 视频的cid |


----
####返回值说明
 |  字段  |     类型    |     说明  |
 | :-------- | :-----: | :--------: |
 | date | String | 弹幕发送时间|
 | timeline | String | 弹幕在视频中的出现时间 |
 | commiter | String | 发送者UID经crc32b摘要后的值 |
 | value | String | 弹幕内容 |




----

###返回值示例
####请求成功返回示例
```json
[{
	"date": "2020-02-18 23:54:59",
	"timeline": "01:11:48",
	"commiter": "c567ab40",
	"value": "hhh"
}, {
	"date": "2020-02-18 23:54:59",
	"timeline": "01:11:48",
	"commiter": "f1407558",
	"value": "\u6ca1\u9519\uff0c\u4f60\u5361\u4e86"
}, {
	"date": "2020-02-18 23:54:59",
	"timeline": "01:11:48",
	"commiter": "7201c14b",
	"value": "\u6beb\u4e0d\u63a9\u9970"
}]

```
请求失败返回示例
```json
Null
```
调用示例
```json
无
```
