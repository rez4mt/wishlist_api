<?php
/**
 * Created by PhpStorm.
 * User: r_mot
 * Date: 7/12/2018
 * Time: 4:16 PM
 */


include "Encryption.php";

$rsa_data = "Dx2wgPbfG+EqEkLM/1YXuhJB1X5t+g2TegZO0pyXk9/TifvD/sL06CWwrDlKLpADgDWNa4W7gmvHh/ZIHHOXQCznt2JpZbdfsgEJvcYrZxThNNaW8AzymSOh3j4CVpB9+14tGljWf4nA3IFBIfJ5IEcjlFJT2/4F85Af2h+D9DZgrNakm0o5ZGbPvzc96J5CltbosEgGWdw5vJsQyZ8CvXDoFpy8uAIQHXyhrHFvWcIf8wx6VLJM6U6K1QHc8T+zQdyKQT2JUAq0pTU5eX6qMlmSQPYDdvTE+j70tKUjMEzONu3d70Z8c7VcGIzIlD+YGzazf67WJbuNpA/SQhubUg==";
$private_key = "MIIEpAIBAAKCAQEArBB6nnSx8WBa0h+BdSyhGLw6n/DvsKprflWprY1+a0LOdWnZT7m+8P0ifWPd4Pzgrg+OtsMKQHOHr9l6gSFbqHqJT+GrzCh9Rqm3HaaNz4z4XtOeK/xJHh0zc73eJUzGTbsuoAUP4Mrh27ICI7Jwu233sGcNFB4xYTzQ5oqOiBMnC0KyvTAbaAyKWoyywjMgwcw51Q/nJ3WW3aU4arVj8zx0dFUm8JwdokUyjyjcU+HwBMT27qUdoQQfvoW4V4xmio9Uyp+7Dd3Pkmtlw7xz8FsMQRyLF1TVDjoZ324beZm13kDAmcIVMcK2x0WskuRjEJrqg+iri57J/02zI8w65wIDAQABAoIBAAZt4M1y7TZogOKneR4SINYPxaqcRUu3BahrnJkQV5zvNILmnzWynXpCIYiV5rO1cmyOk3XFkk7km9Lr4v8lA/Im25XRVN4E1UmCpewrTdLN7anjz/eZlN6iY+QuczjpkxW5QzC8THximE960BTaLtde1vAPqa/XjcWYXb9/heJHsggQFQXt6rjhlDM06uBQKc0adkza0QBNrWefxua9+2rArnpDYqXzejoaSZvLADOZTs3/EKYWRWw5vdHEZyzbR/Gbc+PcY+aWeoIDR7Dkvzn3X1S1s5opn3icTTwOndkP7ghwPmiTaXZNF8m+f4GkymTULAFmQS3tnqVf8USJ88ECgYEA2W0GP9z1CfVPfM+n5hkXFbgv4vJClEFVBKO9+N66K0arX9NF+PuAet318PRWHyItya31dPeVzrm+1vjVuja7OB0BNHBRI4zEnlFyVv1/ic9HRzJKfJxnvwIKe8/1qCXnqYFjPKpRZZQBhs8z6z3uTin8ZNh4cz4TdTXx7BUvYC8CgYEAypc9rF9Lz2uZJSDl1hDqJOo4i0++E24VxXDPZlcIdeZuKSVWwe5yLVk0sPQUTscqPSjznIYEfLlcJzQEh9LIJiOabl7LOsdaJOiNqY9/DjnPztWXZbkwJ/ZhsBZtdnR2AspFFvWwiSIhECSS67gI+o3zfU80vQJREA/XXIrOKskCgYEAyibQya3hcinPhsb3XztyuDHw6/u8pWT86/xl068ZvsTM76Jai30i3pniYe566CV6FuqTrfXIJlWStwLSjHj4ptpo1V2cQwZNhLlLKtA0tWev6OU8VhGBcBkwsB8RUw4zDumK38unNF9g7/tUVWLWX3wv+388tkFADBlk3dBwpOcCgYBpJtb8APp4ToDOpKSm12CwiGGQ7XLa4uip8kOz+riJeXD0Kk09m2Xn48VVk1p3CSkDVZ4cP/NUSWFrd7RiSyVXpmMhplIV0CMZxRrCR5jK6XbTBEnwoo48L8XEf9+Q/CHEkPgLUrqucuh2WIVpk7wVUFhxUgstj2ZDz/UYM3OPAQKBgQCAvN0HJAVIHdj6qRWCfZxAg+glX3e7JrP2ix2MPrE7rg69v9JS28H8fvfyfLtbjA6zkJw7ppj9essamOOeWW48mCvlVzHwHHRQzLD8zOuWEi2i5o4t75BjUwWYKby/80NG0K2R8/9wnm048JeVdmAWvw+U/bkTNnlGvAUlgZWjWA==";
$public_key = "MIIBCgKCAQEArBB6nnSx8WBa0h+BdSyhGLw6n/DvsKprflWprY1+a0LOdWnZT7m+8P0ifWPd4Pzgrg+OtsMKQHOHr9l6gSFbqHqJT+GrzCh9Rqm3HaaNz4z4XtOeK/xJHh0zc73eJUzGTbsuoAUP4Mrh27ICI7Jwu233sGcNFB4xYTzQ5oqOiBMnC0KyvTAbaAyKWoyywjMgwcw51Q/nJ3WW3aU4arVj8zx0dFUm8JwdokUyjyjcU+HwBMT27qUdoQQfvoW4V4xmio9Uyp+7Dd3Pkmtlw7xz8FsMQRyLF1TVDjoZ324beZm13kDAmcIVMcK2x0WskuRjEJrqg+iri57J/02zI8w65wIDAQAB";
$final_data  = "";

//var_dump(Encryption::AES256Decrypt($encrypted_data,Encryption::getEncodedKey(),Encryption::getEncodedIV()));
//var_dump(Encryption::RSADecrypt(base64_decode($rsa_data),$final_data,base64_decode($public_key),Encryption::PUBLIC));
//var_dump($final_data);

var_dump(Encryption::RSAEncrypt("test",Encryption::PRIVATE));
