<?php
/**
 *  +----------------------------------------------------------------------
 *  | Created by  hahadu (a low phper and coolephp)
 *  +----------------------------------------------------------------------
 *  | Copyright (c) 2020. [hahadu] All rights reserved.
 *  +----------------------------------------------------------------------
 *  | SiteUrl: https://github.com/hahadu
 *  +----------------------------------------------------------------------
 *  | Author: hahadu <582167246@qq.com>
 *  +----------------------------------------------------------------------
 *  | Date: 2020/10/8 下午11:27
 *  +----------------------------------------------------------------------
 *  | Description:   think-payment
 *  +----------------------------------------------------------------------
 **/

namespace Hahadu\ThinkPayment;
use Alipay\EasySDK\Kernel\Config as alipayConfig;
use think\facade\Config;

class PayOptions
{
    const SDK_VERSION  = "think-payment Beta";
    public function __construct(){
    }

    /****
     * 支付宝配置相关
     * @return alipayConfig
     */
    static public function getAlipayOptions(){
        $options = new alipayConfig();
        $options->protocol = 'https';
        $options->gatewayHost = 'openapi.alipay.com';
        $options->signType = Config::get('pay.aliPay.sign_type');
        $options->appId = Config::get('pay.aliPay.app_id');

        // 为避免私钥随源码泄露，推荐从文件中读取私钥字符串而不是写入源码中
        $options->merchantPrivateKey = Config::get('pay.aliPay.merchant_private_key');
        $options->alipayCertPath =  Config::get('pay.aliPay.alipay_cert_path');
        $options->alipayRootCertPath = Config::get('pay.aliPay.alipay_root_cert');
        $options->merchantCertPath = Config::get('pay.aliPay.alipay_merchant_cert_path');
        //注：如果采用非证书模式，则无需赋值上面的三个证书路径，改为赋值如下的支付宝公钥字符串即可
        $options->alipayPublicKey = Config::get('pay.aliPay.alipay_public_key');
        //可设置异步通知接收服务地址（可选）
        $options->notifyUrl = Config::get('pay.aliPay.notify_url');
        //可设置AES密钥，调用AES加解密相关接口时需要（可选）
        $options->encryptKey = Config::get('pay.aliPay.alipay_encrypt_key');
        return $options;
    }



}