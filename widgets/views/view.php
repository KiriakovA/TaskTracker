<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>

<div class="contactContainer autoH">
  <div class="contact shadow2 shadow4h bOwhite1">
    <div class="contactLogoContainer">
      <div class="contactLogoText">
       <?= Html::a('Detail', ['detail', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
      </div>

    </div>
    <h3><?=$model->task_name ?></h3>
    <p>Deadline: <?=$model->end_date ?></p>
    <p>Исполнитель задачи:<?=$model->user->login ?></p>
  </div>

<!--   <div class="contact shadow2 shadow4h bOwhite1">
    <div class="contactLogoContainer">
      <img src="https://openclipart.org/image/2400px/svg_to_png/232061/Logo-Logo.png" class="contactLogo" />
      <div class="contactLogoText">
        <h3>Name of the Organization</h3>
        <p>Subheading</p>
      </div>

    </div>
    <h2>Office of Something or other</h2>
    <p>(555)-555-7734</p>
    <p>example@oxomplo.xyz</p>
  </div>
 -->

</div>

