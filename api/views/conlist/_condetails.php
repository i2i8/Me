<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\widgets\ListView;
use api\models\Conhisd;


?>
<div class="condetails-index">
<?php 

echo "消费卡号：" . "&nbsp" . $model ["KH"] . "<br>";
// echo "消费场次：" . "&nbsp&nbsp" . $searchModel['inDateTime'] . "<br>";
// echo "来店时间：" . "&nbsp&nbsp" . $searchModel['inDateTime'] . "<br>";
// echo "客离时间：" . "&nbsp&nbsp" . $searchModel['EndDateTime'] . "<br>";
echo "消费金额：" . "&nbsp" . $model ["XFJE"] . "元";
echo '<hr style="height: 1px; border: none; border-top: 1px dashed gray;" />';
$serial = $searchModel ['Serial'];

$disData = Conhisd::find()->where(['Serial' => $serial])->all();
// echo "<pre>";
// var_dump ($disData);
// echo "</pre>";
?>
	<table border="0" width="100%" cellpadding="0" style="border-collapse: collapse" bordercolorlight="#C0C0C0"	bordercolordark="#C0C0C0" cellspacing="0">
		<tr>
			<td>商品</td>
			<td style='text-align:right'>数量</td>
			<td style='text-align:right'>单位</td>
		</tr>
<?php

for ($i = 0; $i < count($disData, 0); $i ++) {
    echo "<tr>";
    echo "<td>";
    $Name = iconv("gbk", "UTF-8", $disData[$i]['Name']);
    $DanWei = iconv("gbk", "UTF-8", $disData[$i]['DanWei']);
    
    echo $Name;
    echo "</td>";
    echo "<td style='text-align:right'>";
    echo $disData[$i]['Num'];
    echo "</td>";
    echo "<td style='text-align:right'>";
    echo $DanWei;
    echo "</td>";
    echo "</tr>";
}

?>
				</table>

</div>
