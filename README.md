# Identify-watch
主要根据腕表表盘照片，识别表款型号（奢侈品）涵盖五万多款表款
    
    
## 获取access_token

**简要描述：** 

- 获取access_token

**请求URL：** 
- `/api/Search/getAccessToken`
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|timestamp |是  |string |时间戳   |
|signature |是  |string | 签名    |
|appid     |是  |string |  调用接口的appid    |

 **返回示例**

```
{
    "code": 200,
    "error": "",
    "errorNo": "",
    "data": {
        "access_token": "3e510c715a45020f808809c9612378fb",
        "expiration_time": 1523346128
    }
}
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|code |string   |状态码  |
|error |string   |错误消息  |
|errorNo |string   |错误编码  |

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|access_token |string   |接口票据  |
|expiration_time |string   |过期时间戳  |
 **备注** 
```
//签名算法
md5(base64_encode($timestamp.$appId.$appkey.$secretkey))

1、你方服务器与我方服务器 时间相差不能上下相差3分钟
2、expiration_time 时间是票据过期时间 请提前更新票据
```
- 更多返回错误代码请看首页的错误代码描述



## 识别接口

    
**简要描述：** 

- 识别接口

**请求URL：** 
- `/api/Search/searchWatchByImage `
  
**请求方式：**
- POST 

**参数：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|image |是  |文件 |文件   |
| result_nums |是  |string | 获取前几个结果    |

**头：** 

|参数名|必选|类型|说明|
|:----    |:---|:----- |-----   |
|appid |是  |string |appid   |
|access_token |是  |string | 票据    |

 **返回示例**

``` 
 {
    "code": 200,
    "error": "",
    "errorNo": "",
    "data": {
        "total": 10,
        "list": [
            {
                "model_id": 2198,
                "model_name": "61.2188.L.6.6.23.6",
                "product_id": 988,
                "score": 1,
                "percent_score": "100%",
                "sample_photo": "http://p6uhfiem5.bkt.clouddn.com/Fl_dmXMvkxIQt9x7gv9Xd2pHoB7c",
                "title": "艾米龙净雅61.2188.L.6.6.23.6"
            },
            {
                "model_id": 2196,
                "model_name": "06.2188.L.6.6.28.6",
                "product_id": 986,
                "score": 0.96675962209702,
                "percent_score": "96.68%",
                "sample_photo": "http://p6uhfiem5.bkt.clouddn.com/FvgCzKvALAWQYUzf4JgceXalDjeJ",
                "title": "艾米龙净雅06.2188.L.6.6.28.6"
            },
            {
                "model_id": 2199,
                "model_name": "61.2188.L.6.6.28.6",
                "product_id": 989,
                "score": 0.96619343757629,
                "percent_score": "96.62%",
                "sample_photo": "http://p6uhfiem5.bkt.clouddn.com/FnoNMAo-BngpLtNUujiTOPgwCObS",
                "title": "艾米龙净雅61.2188.L.6.6.28.6"
            },
            {
                "model_id": 2193,
                "model_name": "06.2188.L.6.6.27.6",
                "product_id": 983,
                "score": 0.85338747501373,
                "percent_score": "85.34%",
                "sample_photo": "http://p6uhfiem5.bkt.clouddn.com/FpNlB13bqMzIj2Gf-nSRnSB_IeCO",
                "title": "艾米龙净雅06.2188.L.6.6.27.6"
            },
            {
                "model_id": 2189,
                "model_name": "61.2188.L.6.6.27.6",
                "product_id": 979,
                "score": 0.84152507781982,
                "percent_score": "84.15%",
                "sample_photo": "http://p6uhfiem5.bkt.clouddn.com/Fmu-5TLYTzbpfCpNCXraQdWBSWQC",
                "title": "艾米龙净雅61.2188.L.6.6.27.6"
            },
            {
                "model_id": 2186,
                "model_name": "61.2188.L.6.8.27.6",
                "product_id": 976,
                "score": 0.8401153087616,
                "percent_score": "84.01%",
                "sample_photo": "http://p6uhfiem5.bkt.clouddn.com/FlBoMiXrUixi4IltdUSWk_LdkPa5",
                "title": "艾米龙净雅61.2188.L.6.8.27.6"
            },
            {
                "model_id": 2200,
                "model_name": "06.2188.L.6.6.28.2",
                "product_id": 990,
                "score": 0.78254270553589,
                "percent_score": "78.25%",
                "sample_photo": "http://p6uhfiem5.bkt.clouddn.com/FsAT33JSF0D8dRLGSNNUo4edt9X-",
                "title": "艾米龙净雅06.2188.L.6.6.28.2"
            },
            {
                "model_id": 2191,
                "model_name": "61.2188.L.6.6.28.2",
                "product_id": 981,
                "score": 0.76639664173126,
                "percent_score": "76.64%",
                "sample_photo": "http://p6uhfiem5.bkt.clouddn.com/FsKftavR5DsLHpVKWAOYs7mJlQdQ",
                "title": "艾米龙净雅61.2188.L.6.6.28.2"
            },
            {
                "model_id": 46912,
                "model_name": "LS8380-48121",
                "product_id": 48435,
                "score": 0.75549960136414,
                "percent_score": "75.55%",
                "sample_photo": "http://p6uhfiem5.bkt.clouddn.com/Fm84RLjkq51oZuFr13Waus6mmtXD",
                "title": "依波路复古LS8380-48121"
            },
            {
                "model_id": 13865,
                "model_name": "GA8102.WWW",
                "product_id": 13058,
                "score": 0.74787712097168,
                "percent_score": "74.79%",
                "sample_photo": "http://p6uhfiem5.bkt.clouddn.com/FqJwP1o-m0L-q4GLzUV0DuQOvxrI",
                "title": "飞亚达恒昱GA8102.WWW"
            }
        ]
    }
}
```

 **返回参数说明** 

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|code |string   |状态码  |
|error |string   |错误消息  |
|errorNo |string   |错误编码  |

|参数名|类型|说明|
|:-----  |:-----|-----                           |
|total |string   |条数  |
|list |array   |数据  |


|参数名|类型|说明|
|:-----  |:-----|-----                           |
|model_id |string   |型号id  |
|model_name |string   |型号名称  |
|product_id |string   |样本id  |
|score |string   |相似度  |
|percent_score |string   |相识度百分比  |
|model_name |string   |型号名称  |
|title |string   |  样本标题|
|sample_photo_url |string   |样本图片访问地址  |

 **备注** 

- 更多返回错误代码请看首页的错误代码描述


