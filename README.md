

# zyan/douyin-music

已实现获取视频中的

- [x] 音乐连接
- [x] 音乐名称
- [x] 音乐图片
- [x] 音乐缩略图
- [x] 音乐作者


## 要求

1. php >= 7.3
2. Composer

## 安装

```shell
composer require zyan/douyin-music -vvv
```
## 用法

```php
use Zyan\DouyinMusic\DouyinMusic;

//抖音
$music = DouyinMusic::get('https://v.Douyin.com/eeYy4Yo/');

```

获取所有信息

```php
$music->getData();

/*
Array
(
    [music] => https://sf3-cdn-tos.douyinstatic.com/obj/ies-music/7020997451465214728.mp3
    [img] => https://p3.douyinpic.com/aweme/1080x1080/aweme-avatar/tos-cn-avt-0015_a919f61807c59ed80652227436267782.jpeg?from=116350172
    [thumb] => https://p26.douyinpic.com/img/aweme-avatar/tos-cn-avt-0015_a919f61807c59ed80652227436267782~c5_168x168.jpeg?from=116350172
    [title] => @Scenery 阿健创作的原声一Scenery 阿健（原声中的歌曲：Birds Chatting Calmly-Silent Knights）
    [author] => Scenery 阿健
)
*/
```

单个获取

```php
//获取title
$music->getTitle();

//获取img
$music->getImg();

//获取music
$music->getMusic();

//获取作者
$music->getAuthor();

//获取音乐缩略图
$music->getThumb();

```


## 参与贡献

1. fork 当前库到你的名下
3. 在你的本地修改完成审阅过后提交到你的仓库
4. 提交 PR 并描述你的修改，等待合并

## License

[MIT license](https://opensource.org/licenses/MIT)
