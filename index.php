<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Git/PHP/SQL test assignment</title>
</head>
<body>
    <div class ="container">
    <h1 class="m-4 text-center">Git/PHP/SQL test assignment</h1>
        <div class="container-profile ">
        <div class="container-profile-row row container-fluid">
            <div class="container-profile-photo col-sm-5 col-md-6">
            <img src="images/profile-pfp2.jpg" class="img-responsive" alt="">
            </div><!-- container-profile-photo -->

            <div class="container-profile-text col-sm-5 col-md-6 text-center">
            <p>わたしはタグチ　イザドラ　チエミです。　ブラジル出身です。わたしが子供のころから犬がだいすきですけど、アレルギーがもって、犬を飼うのは無理です。趣味はネットフリックスを見ることと真犯罪のポッドキャストを聴くことです。最近、プログラミング学習の旅に出ました。</p>
            <p>My name is Isadora, and I'm from Brazil. I love dogs and sunny days. My hobbies include watching Netflix and listening to true crime podcasts. Recently, I have embarked on a journey to learn programming, and I am determined to become a skilled professional in this field.</p>
            </div><!-- container-profile-text -->
        </div><!-- container-profile-row row -->

        </div><!-- container-profile -->

        <div class="container-comments">
        <?php include 'comments.php'; ?>
        </div><!-- container-comments -->
        <div class="container-form">
        <?php include 'form.php'; ?>
        </div><!-- container-form -->
    </div>
</body>
</html>