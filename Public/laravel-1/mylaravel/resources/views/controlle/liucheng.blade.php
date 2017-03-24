<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>流程控制</title>
</head>
<body>
	<!-- if -->
	给你买炫酷
	@if($total >= 90 && $total <= 100)
		游戏机
	@elseif($total >= 80 && $total < 90)
		望远镜
	@elseif($total < 80 && $total >= 60)
		钢笔
	@else
		锤子
	@endif
	你说怎么样

	<hr>

	@if($money >= 5 && $money <= 10)
	把我当啥
	@elseif($money >10 && $money <= 50)
	不行
	@elseif($money > 50 && $money <= 200)
	蛋疼
	@endif

	<hr>


	性别:<input type="radio" name="sex" value="0" @if($sex == 0) checked="checked" @endif>男
		 <input type="radio" name="sex" value="1" @if($sex == 1) checked="checked" @endif>女
</body>
</html>