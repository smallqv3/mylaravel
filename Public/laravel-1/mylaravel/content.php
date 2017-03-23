1.路由
	路由:是将信息从源地址传递到目的地角色(扮演角色:迎客角色,在路由中进行请求匹配,匹配到了之后在进行分配 例子:
																	店小二:路由
																	客人吃饭:匹配请求
																	店小二带客人到吃饭的号码桌:进行分配)
	基本路由:Route::get('/love',function(){return '弄啥咧...........';});
			 Route::post('/insert',function(){});
			 Route::put(................);
			 Route::delete(...............);
2.注意点:最后的分号一定不能丢
	Route::get('/', function () {
	    return view('welcome'); // 请求 / 根路径,指向welcome页面 
	});这里不要把分号给丢了

3.报错信息
	MethodNotAllowedHttpException in RouteCollection.php line 218:
	说明当前的请求方式和路由规则的请求方式不匹配

4.laravel框架中所有的模板文件都是存放在 resources/views中

5.模板文件的后缀名: .blade.php

6.错误信息
	TokenMismatchException in VerifyCsrfToken.php line 53:
	说明:当前的post请求中缺少验证信息 (get请求不受限制)
	在每一个post表单中需要添加隐藏域来完成请求,放在form表单中就行了{{csrf_field()}}

7.模拟put和delete请求
	<form action="/update" method="post">
		用户名:<input type="text" name="username"><br>
		密码:<input type="password" name="password"><br>
		<input type="hidden" name="_method" value="PUT"> put请求value="PUT"
		<button>点击提交</button>
		{{csrf_field()}}
	</form>
	<form action="/del" method="post">
		用户名:<input type="text" name="username"><br>
		密码:<input type="password" name="password"><br>
		<input type="hidden" name="_method" value="DELETE"> delete请求value="DELETE"
		<button>点击提交</button>
		{{csrf_field()}}
	</form>

8.错误信息
	NotFoundHttpException in RouteCollection.php line 161:
	说明 路由规则没有能匹配上请求路径

9.当前路由规则中的参数名 可以跟匿名函数或者方法中的参数名 不保持一致
	潜规则中是保持一致


10.中间件
	作用:在对路由发送到控制层(目的地)的请求进行筛选检测,而且还可以对发送过来的信息进行记录,看看是否有处于黑名单信息上面,都通过之后才会去放行,类似于路由匹配到了之后的另一层再次核对信息

	例子:路由进行某个学校的老师学生匹配,匹配到了你是老师或者学生,需要进学校, 门卫(中间件) 进行下一步检测,看看你的证件是否是这所学校的老师或者学生,是的话就通过,不是的话就会被挡在原地,不让通行
	

	1.创建中间件:
		利用doc命令行cd到你的laraval框架目录下的artisan文件处于同一目录,执行以下命令操作:(执行此命令操作就行,默认的操作不直接生效)
			php   artisan 		make:middleware 	TestMiddleware  
		php命令  artisan文件	文件中的创建方法	自定义的middleware文件名称(这里的文件创建也可以指定路径创建, 默认会创建在Controllers/Middleware目录下)
	
	2.中间件文件的默认存放目录: app/http/middleware中(而所生成的中间件文件就好比 门卫大爷记录所有通行信息的记录文件)
	  在以上文件中写入事例代码

	3.注册
		全局注册:Http/kernel.php中写入$middleware成员属性
				protected $middleware = [
			        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
			        \App\Http\Middleware\EncryptCookies::class,
			        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
			        \Illuminate\Session\Middleware\StartSession::class,
			        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
			        \App\Http\Middleware\   VerifyCsrfToken     ::class,
			        框架中原规则			中间件类名	  		默认访问形式
			    ];

			    \App\Http\Middleware\VerifyCsrfToken::class 等同于  '\App\Http\Middleware\VerifyCsrfToken'(双引号会转义里面的反斜线)
		路由注册:(局部控制)Http/kernel.php中写入$middleware成员属性
				protected $routeMiddleware = [
			        'auth' => \App\Http\Middleware\Authenticate::class,
			        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
			        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
			    ];

11.$request 是laravel框架对请求报文做的一个封装类文件(相当于是一个依赖注入的容器)
	文件地址:/vendor/symfony/http-foundation/Request.php

12.$request 是laravel框架对请求报文做的封装


13.laravel控制器
	创建控制器:(第一种默认创建自带的方法)
		php 	  artisan 		make:controller 	TestController (Admin/UserController)
	  php命令	artisan文件		文件中的创建方法	自定义的控制器文件名称(这里的文件创建也可以指定路径创建, 默认会创建在Controllers目录下)

	  第二种:默认不创建控制器自带的方法
	  	php 	  artisan 		make:controller 	UserController			--plain
	  php命令	artisan文件		文件中的创建方法	自定义的控制器文件名称	清除默认自带的方法(简洁操作)

14.错误信息 BadMethodCallException in Controller.php line 283:
			Method [show] does not exist.
			当前控制器下没有声明该方法


15.在laravel中是可以使用return的方式向客户端返回内容(其他框架中默认一般都是echo来进行输出内容)

16.隐式控制器
	隐式控制器 如果是goods开头的路径 都是交给GoodsController去实现(是啥开头的路径,就交给他的控制器去实现)
	Route::controller('goods', 'GoodsController');

	使用方式:a) 创建路由规则
				Route::controller('goods', 'GoodsController');
			 b) GET /goods/add HTTP/1.1
			 	这个时候会执行 GoodsController下的getAdd方法

			 	POST /goods/insert HTTP/1.1
			 	这个时候会执行 GoodsController下的postInsert方法


17.restful控制器
	动词			路径			行为（方法）	
	GET			/photos				index			
	GET			/photos/create		create			
	POST		/photos				store			
	GET			/photos/{id}		show			
	GET			/photos/{id}/edit	edit			
	PUT/PATCH	/photos/{id}		update			
	DELETE		/photos/{id}		destroy		

18.请求
	基本信息获取:
		// 请求的方法获取
    	// $method = $request->method();
    	// 检测请求方法
    	// $res = $request->isMethod('get');
    	// 请求的路径
    	// $path = $request->path(); // 请求行路径中的 / 之后 ? 之前的路径进行获取
    	// 获取完整的url
    	// $url = $request->url();
    	// 获取请求的ip
    	// $ip = $request->ip();
    	// 获取端口
    	// $port = $request->getPort();

	提取请求参数:
		// 参数的获取
    	// $username = $request->input('username'); // input()括号中放入需要提取的参数名称
    	// $password = $request->input('password');

    	// 设置默认值
    	// $res = $request->input('vip', '10'); // 检测参数是否为空,空的话用默认值,不空的话用你所穿的参数:I('get.name', 'xiaohigh')
    	// 检测请求参数是否存在
    	// $res = $request->has('username'); // 包含此参数就会返回true 或者 1,不包含则返回false 或者 0
    	// 获取所有的请求参数
    	// $res = $request->all();
    	// 获取其中的一部分参数
    	// $res = $request->only(['username', 'password']); // 只获取部分参数
    	// 剔除不需要的参数
    	// $res = $request->except(['username', 'password']); // 剔除部分参数
    	// 获取请求头信息
    	// $res = $request->header('Connection'); // 括号内不放键名,则获取全部的Request Headers头信息,放入键名的话,则只获取对应键名的头信息

    文件操作:
    	检测是否有文件上传操作:
    		// 检测文件是否上传
	    	// $res = $request->hasFile('profile'); // 返回的结果正确:true 或者 1 返回的错误结果:false 或者 0
	    	// php脚本中的相对路径,都是相对于当前正在请求的文件(所有的相对路径对于mvc框架都是相对于网站根目录index.php(laravel中的网站根目录在public/index.php))

	    	if($request->hasFile('profile')){
	    		$request->file('profile')->move('./upload', 'xiaohigh.jpg'); // 将文件移动到指定位置 move()中的两个参数:第一个参数文件夹路径,第二个参数图片名称
	    	}
    	将文件移动到指定位置:
    		$request->file('profile')->move('./upload', 'xiaohigh.jpg'); // 将文件移动到指定位置 move()中的两个参数:第一个参数文件夹路径,第二个参数图片名称,相对路径都是在和根目录index.php统计目录下

    cookie操作:
    	设置:
    		// \Cookie::queue('name', 'xdl', 20); // 括号中的三个参数:第一个是键名,第二个是键值,第三个是cookie生命周期时间(时间单位分钟)
    		return response()->withCookie('xiongdilian', 'zhenbang', 5); // withCookie括号中的三个参数:第一个是键名,第二个是键值,第三个是cookie生命周期时间(时间单位分钟) 注意:response('')括号中必须得有值,可以自定义值,值为空也行,不能写成response()这样,否则会报错
    		错误:BadMethodCallException in Macroable.php line 81:
    			 Method withCookie does not exist
    	读取:
    		// $res = \Cookie::get('name');

    		// $res = $request->cookie('xiongdilian');
    		错误:ErrorException in UserController.php line 139:(未注入Request $request参数)
				 Undefined variable: request

	闪存信息: $request->flash()先闪存数据信息 -----> 再去读取闪存(old(),session()),并且清空 -----> 闪存数据已经不存在了 
		将所有的请求参数写入闪存中: $request->flash();可配合return back()使用,且只能存在使用一次,使用完一次后就会失效
			$request->flash(); // 将请求过来的参数 都闪存起来,一般用作用户填写表单信息漏填之后,return back()跳转回原来页面信息全部清空且重新填写,这个时候之前填写的信息就可以读取闪存了,可以减少了用户正确信息重复填写的麻烦
	    	// 跳转到原来页面重新填写参数
	    	return back(); // return back()->with():with括号中第一个参数是键名,第二个参数是键值,可用来传递错误信息

		将部分参数写入闪存中: $request->flashOnly('title', 'price'); // 只闪存里面所填参数的数据
		出去某些参数之外的参数: $request->flashExcept('_token'); // 只闪存除去里面所填参数的数据
		自定义内存: \Session::flash('name', 'xiaohigh');
			/**
		     * 自定义闪存 
		     */
		    public function flash_1()
		    {
		    	// 手动闪存数据
		    	\Session::flash('name', 'xiaohigh'); // 第一个参数键名称,第二参数是键值
		    }

		    /**
		     * 读取闪存
		     */
		    public function get_flash()
		    {
		    	echo session('name'); // 系统定义的函数名称
		    }
19. 何为契约模式:就好比类中的方法一样,实例化成对象之后,你就可以使用类中的方法,就好像是方法和类签订了契约一样
	何为外观模式:
		看上去的情况和实际情况是不一样的,就比如路由中的Route::get(); Route类中的压根就没有get()方法,他是通过__callStatic()魔术方法进行对指定方法或者类,进行创建再执行这个类或者是方法


20.响应:
	// 返回字符串类型
	// return "aaaaaaaaaaaaaa";

	// 返回并设置cookie
	// return response('')->withCookie('name', '兄弟连', 10); // withCookie括号中的三个参数:第一个是键名,第二个是键值,第三个是cookie生命周期时间(时间单位分钟) 注意:response('')括号中是对响应体做一个数据返回,必须得有值,可以自定义值,值为空也行不能写成response()这样,否则会报错(当然只对于这个方法操作)

	// 返回json字符串:在线解析json网址:http://json.parser.pnline.fr(强哥推荐进行转码的网站)
	// return response()->json(['name'=>'兄弟连', 'age'=>11, 'position'=>'昌平区']);

	// 文件下载:绝对路径以及相对路径	return response()->download('./upload/xiaohigh.jpg'); 
		// 相对路径:在整个框架脚本当中,所有的相对路径相对的都是入口文件index.php开始的路径,脚本中的相对路径是相对当前正在请求的文件

	// 页面跳转:网站内部路径
		// return redirect('/file');
	// 网站外部路径:
		// return redirect('http://www.baidu.com');

	// 模板解析
	// return view('response');

	// 设置响应头信息
	// return response('a')->header('name', 'lamp兄弟连'); // header括号中第一个参数是键名名称,第二个参数是键值,注意:response('')括号中是对响应体做一个数据返回,必须得有值,可以自定义值,值为空也行不能写成response()这样,否则会报错(当然只对于这个方法操作)

	// 设置返回内容并跳转
    	// return 'aaaaaaaaaaa<script>
					// setTimeout(function(){
					// 	location.href="/file";
					// },3000)
    	// 		</script>';
    mvc强哥说法:
    	m层:专门对数据库进行操作,增删改查操作都交给模型层去做
    	c层:负责中间调度操作,可把我们的逻辑性代码放入控制层去做,比如if判断、权限验证
		v层:把内容显示的元素放到视图中去完成,不同的页面的值是不一样的,通过分配不同的变量来显示不同的页面信息显示,负责页面宣传、显示的功能

21.视图(解析模板)
	解析模板
		// return view('xdl');

		// 划分目录 结构:目录.页面
		// return view('user.index');

	解析模板并分配数据
		$arr = ['name'=>'xdl', 'age'=>11, 'position'=>'北京昌平区'];
		return view('user.xdl', ['xdl'=>$arr]); // 第一个参数是页面路径,第二个参数是关联数组数据信息,第二个参数中的数据形式类似tp中$this->assign('键名', '键值')

	模板引擎blade
		模板默认的存放位置:resources/views

		使用变量:{{$username}} <title>{{$title}}</title>

		使用函数:{{time()}} 当前时间:<span style="color:red;">{{date('Y-m-d H:i:s', time())}}</span><br>

		设置默认值:{{$username or 'guest'}} 欢迎您回来:{{$username or 'guest'}}<hr>

		显示html代码:{!!$name!!} <div id="pages">{!!$page!!}</div>

		引入子视图:@include('header')
		模板继承:
		流程控制:
		循环控制: