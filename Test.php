<?php
$key = "-----BEGIN PRIVATE KEY-----
MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQC2Kbjf4NzCYjYf
uPpdyE7MBzNg08IQhTSQWU0ZJDjMA3t4EVnSuiJjogLiAXM7AbkmmoSe83NIOltF
CXQSDdkmWQX1WYVXKmoPqtGT5mJ9uNpcxWsVYQB794muKk+SFEcxUpHSgwa2CFfk
ySv52A/SnyENpxUOyJBMoc6rfK9tQ906LisY1kdOpo2/RuKAexObPwBpfOJyGOZn
rjWaaRsyNJBQgMumD0njNIMWRrekVAR9uBQvS6GDS7KoyC/NQhO+HXG3bXLJ4z39
J9YFUHa3wJd5Q1+snfVNEIaZI/fjM4p15YlPRDkLG4UtbRB1UM5K9pWE3eohrYdN
3YMGC2jnAgMBAAECggEAJoH/YORKBpV4V5Bk7LpRXfQPumJJXfCqwfD+yVfM4ePC
kAkq8c8DQgiXj2s7Drg4iZ6Udn2EWzpq3Nc4wDBJPUAIcGsyMtD2hsVXdGp5W5Ze
Ispg7q4Iyivz4Ot00q6Stix8QwILwyNUYTrdnv07qwyUkixF2VAwoOJ7q+i5tOEO
XB1ukyp2N+redRRbyEkGyH8ydI8Hz/B9S0WD+6e9BCPvGnSs+3Bne/YfNpd2t0v6
6U3EKEzQNpnMg11BrbZFCRGsJBk5n9U4YoQjtsptJfvCFFDSItjWRuixqZBMUMKU
712LysA970nZlXrccpLrdZzHhgvAllALzzJ7mSagsQKBgQDhEJh9TwN/za8C2HH7
P0/ePA4KoXs517NAMm4KuYGX8iuIlRuYXXpdKSP+nzJbS/Vaqo6tAOzM6E/qC74V
VVCQgKpexHg2M5XJ52onWhPvAmajvR6GjPz0QWXGH1E+7TyFRNpbTKgSzvKavNgZ
29j61XE0B46W8/hKibpoJaMO5QKBgQDPM4eo0zpq635RNohQFtaYNAap80rc/W+R
XmfWAQZlbZ9Y/i4uln+CeBqVv22yvHkVa1/ZtYpkoxOslCMamTScyhgZ08cxje9I
jf0iB+vtqix1AjKM/6St0s83uxbycjJ9TWFz2mZ5sTTDRyUiG62+08siY5B31qm0
X1m2ZdFP2wKBgQCJQNSt/qS0qRvk0VjZjyfG8Lrjcs0yXj/7k4WWVsEYh+BSoBQ/
HCrGa5N+8VkFYlJTo5X1HY5L/BTYN6cJXYkPRtgfiROCgn0Dr3QGYaGsbbtoeaoH
Bi4xSzyk0W57wLPa1j2P1jTdm4VKJoZnZrJxbf9maoFjv48Y7dtXLjS9nQKBgBmC
ybAima2yYvIS2cOqnC9PMIbaOpxs48CtM/GoXKY+UgE+AmegBgEFUpifYh1AkVPu
zXVbobd0UKbN8miC9nRbeY4sgfj69bwkJ0d6XDT9381kQN8VVqxEKVk+QrwFDWxa
C6ac/EL9a3ajmtHRQJofL4KDabUni+t2VfBcJuJDAoGBAKYTFUVcpOG2KZEVSmGO
Cq8QOFzQ3zZAJTh/zKpfpty30+6JQm7yfGSfEbJIaAn8nWc08xj8YFCAmP+c7esz
Sw0P33lkU/0svBLCOwr8iJJFca97F3+B6Tr4YjsbAKzuHu/vyXf98D3jpf97opQb
yIo1qk9m536c2AYheWH9yj8A
-----END PRIVATE KEY-----";

//Тестовый текст
//$key_pril = 'TestData';

//Конфиг генерации ключей
/*$config = array(
    "private_key_bits" => 2048,
    "private_key_type" => OPENSSL_KEYTYPE_RSA,
);

//Генерация связки ключей
$res = openssl_pkey_new($config);

//Получнгие приватного ключа из связки ключей
openssl_pkey_export($res, $privKey);

//Получение публичного ключа из связки ключей
$pubKey = openssl_pkey_get_details($res);
$pubKey = $pubKey["key"];

//Вывод публичного и приватного ключей для копирования
print_r($pubKey);
print_r($privKey);

//Вывод тестового текста перед шифровкой и дешифровкой
print_r($key_pril);

//Шифрование текста(публичный ключ)
if(openssl_public_encrypt($key_pril, $encrypted, $pubKey)) {
    echo $encrypted . "\n";
}*/

//Получение зашифрованного текста из запроса
$encrypted = base64_decode(json_decode(file_get_contents("php://input"),true)['key_pril']);

//Дешифровка текста(приватный ключ)
if(openssl_private_decrypt($encrypted, $decrypted, $key)) {
    print_r($decrypted);
}





