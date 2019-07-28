#php面向对象

####类与对象的介绍

-  **类与对象的关系**
   - 类与对象的关系就如同模具和铸件的关系，类的实例化就是对象，而对象的抽象就是类。

- **什么是类**
  - 在面向对象的编程语言中，类就是一个独立的程序单位，是具有相同属性和服务的一组对象的组合。他属于该类的所有对象提供了同意的抽象描述，其内部包括成员属性和服务的方法两个部分。

- **什么是对象**
  - 类的实例化就是对象

####如何抽象一个类
- **类的声明**
   - [一些修饰类的关键字] class 类名 {
       类中成员；
   }
   ```
    class boy{
       var  $name;//成员属性
       var  $sex;
       var  $age;
       
       //成员方法
       function  say(){
           echo "so beautiful";
       }
    }
   ```
   在类声明中，变量前面多使用一个关键字"var"来声明，声明变量时不需要任何关键字修饰，但是在类中声明成员属性时，变量前面**一定要使用一个关键字**，例如public，private，static等关键字修饰，如果没有特定意义的修饰，就使用"var"，**一旦成员属性有其他的关键字去修饰就需要去掉var**  
   <br>

   - **实例化对象**
       ```
        $li = new People("li" ,null ,12);
        ```
   -  **对象类型在内存中的分配**
       - **栈空间段**
          栈的特点是空间小但被CPU访问的速度快，是用户用来存放程序中临时创建的变量。
       - **堆空间段**
         堆是用来存放进程运行中被动态分配的内存段，它的大小不固定，可动态扩张或缩减。用于存储数据长度可变或占用内存比较大的数据。例如，字符串，数组，对象。
        - **数据段**
         数据段用来存放可执行文件中已初始化全局变量，换句话说就是程序静态分配变量。   
        - **代码段**
          代码段用来存放可执行文件的操作指令，也就是说他是可执行文件在内存中的镜像。
          对象类型的数据就是一种占用空间比较大，而且长度不定的数据类型。所以对象一般存储在堆里面，而在栈中存储的是**对象在堆中的地址**。（在javascript中两个对象的比较实际上并非是对象中的元素，而是比较的是对象在堆中的存储地址。）
          ```
          class  People{
                  public $name;
                  public $sex;
                  public $age;

                 //在类继承创建一个新的子类时，会触发此函数
                 function __construct($name = " " , $sex = "男" , $age = 0)
                   {
                        $this->name = $name;
                        $this->sex = $sex;
                        $this->age = $age;

                   }

                function  say(){
                      echo "hello 我是".$this->name."我今年".$this->age."岁\n";

                   }

                function  run(){
                   $this->say();
                }

           }

           $li = new People("li" ,null ,12);
           $li->run();
           $yi = $li;
           $yi->name = 'yiyi';
           $li->run();
          ```
          运行结果：
          ```
          hello 我是li我今年12岁
          hello 我是yiyi我今年12岁
          ```
          实际上在 `$yi = $li;`执行过程中并非是将`$li`中的对象元素赋值给`$yi`而是将`$li`在堆中的地址赋值给`$yi`，所以这个时候他们的指针共同指向同一个对象，只要对其中一个操作，两个访问时都会改变。
          这个时候应该使用new进行操作，new是在堆中新开辟空间进行存储。
          <br>
    - **对象成员的访问**
      ```
        $引用名 = new 类名称([参数数列表]) ;            $you = new People()
        $引用名->成员属性名 = 值;                       $you->name = 'yiyi'
        $引用名->成员方法;                              $you->run()
      ```
    - **特殊的对象引用`$this`**
       对象一旦被创建，在对象中的每个成员方法里面都会存在一个特殊的对象引用`$this`。
       相当于在对象的内部使用引用名称"我"进行自己内部成员的访问。
    - **构建方法和析构方法**
        构建方法与析构方法是对象中的两个特殊的方法，他们都与对象的生命周期有关。
        构建方法是对象创建完成后第一个被调用的方法。通常作为对象初始化工作。
        而析构方法是对象销毁之前最后调用的一个函数。通常作为对象销毁前的清理工作。
        <br>

        - **构建方法**
          ``` 
            function __construct($name = " " , $sex = "男" , $age = 0)
                   {
                        $this->name = $name;
                        $this->sex = $sex;
                        $this->age = $age;

                   }  
            //$name = " " 若为传参 ， 默认参数 = " "        
          ```

        - **析构方法**
          ```
            function __destruct()
            {
                // TODO: Implement __destruct() method.
                echo "It is time to say goodbye";
            }


###封装性   
   -  介绍  
       - 封装性是面向对象编程的三大特性之一，封装性就是把对象的成员属性和成员方法结合成一个独立的相同单位，并尽可能隐蔽对象内部细节，含义如下：

           - 把对象的全部成员属性和全部成员方法结合在一起，形成一个不可分割的独立单位。
           - 信息隐蔽，尽可能的隐蔽对象的内部细节，对外界形成一个边界，只保留有限的对外接口使之与外部发生联系。
    
    - 设置私有成员
        - 使用private关键字修饰就实现了对成员的封装。封装后对象外部不能访问，但在对象内部的成员方法可以访问。
        `    private $sex;`
        - 四种魔术方法
          - _set（）
          如果成员属性使用了private 关键字封装起来，使对象收到了保护。但是在程运行过程中可以按要求改变一些私有的属性。
           ```
            function __set( $name, $value )
            {
                // TODO: Implement __set() method.
                $this->$name = $value;

             }
             $li->sex = 'm';//使用方法


             function put($name , $value){
                      $this->$name = $value;
             }

             $li->put('sex' , 'y');
           ```

          - get（）
            ```
                function __get($name)
                 {
                      // TODO: Implement __get() method.
                      return $this->$name;
                 }
            ```
          - __isset() 和 __unset()
            isset是用来测定变量是否存在的函数
            unset是用来删除指定的变量
            ```
            function  __isset($name)
                   {
            // TODO: Implement __isset() method.
            if ($name = 'name' || $name = 'sex' || $name = 'age'){
                   return true;
            }else{
                   return false;
                }
            }
            var_dump(isset($li->name));
            ``` 

##继承性
   继承性也是面向对象程序设计中的重要特性之一，在面向对象的领域中有着及其重要的作用。他是指建立一个新的派生类，从先前定义的类中继承数据和函数，而且可以重新定义或加进新的数据和函数，从而建立了类的层次和等级关系。
   多继承--一个派从多个基类派生
   单继承--一个派从一个基类派生
   php中只有单继承。
   - **类继承的应用**
   比如在People类中假设有name，age两个成员属性，run（），say（）两个成员方法。现在我们需要在程序中声明一个Student的学生类，而学生类中的属性正是People中所有的，就可以让Student继承People中的属性，就不需要在重新生命一边。
   ```
    class People{
        protected $name;
        protected $age;
        protected $sex;

        function __construct($name = 'yuyi' ,  $age = '18' , $sex = 'w')
        {
            $this->name = $name;
            $this->age = $age;
            $this->sex = $sex;
        }
    }

    class Student extends People{
         private $ID;

         function __construct($name = 'yuyi', $age = '18', $sex = 'w' , $ID = '201')
        {
            parent::__construct($name, $age, $sex);
            $this->ID = $ID;
        }

        function say(){
             echo 'my name is '.$this->name."\nmy ID is ".$this->ID;//''中字符串不会被解析，""中字符串才会被解析
        }
    }

    $student = new Student('liu' , '12' , 'm' , '201');
    $student->say();

   ```

  - **访问类型控制**
    1. **public 公共的访问修饰符**
       成员没有访问限制 
    2. **私有访问修饰符 private**
       对于同一个类里的所有成员都是没有访问限制的，但是对于该类外部的代码是不允许改变甚至操作的，对于该类的子类，也是不能访问的。
    3. **保护的访问修饰符protected**
       对于该类的子类以及子类的子类都有访问权限，可以进行属性，方法的读写操作。
  - **子类中重载父类的方法**
    子类中重载父类的方法就是在子类中覆盖从父类继承过来的方法。就是在父类继承方法的基础之上在根据自己类中的实际情况做完善。

  -  **常见的关键字的应用**
     - **final**
       它可以加在类或类中方法前。但**不能使用它表示成员属性**，虽然final有常量的意思，但在php中定义常量是使用define()函数来完成的。
       使用final标识的类，不能被继承。
       在类中使用final表示的成员方法，在子类中不能被覆盖。
     - **static**
       可以将类中的成员表示为静态。则这个static成员总是唯一存在的，在多个对象之间进行共享。因为static标识的成员是属于类的，所以和其他的对象实例和其他类无关。
     - **const**
       将类中的成员定义为常量
       `const str = "const value"`

     - **instanceof**
       可以确定一个对象是类的实例，类的子类。
       ```
       $man = new Person();
       if($man instanceof Person)
          echo '$man 是 Person 的实例化对象'
       ```
     - **clone**
       使用**new**关键字重新创建对象，在为属性赋上相同的值，是比较烦琐容易出错的。
       在php中可以根据现有的对象克隆出一个完全一样的对象。克隆以后两个副本完全相互独立。
       ```
       $p1 = new Person('zhang' , 'm' , '12)
       $p2 = clone $p1;
       ```
     - **__toString()**
       它是快速获取对象的字符串表示的最快捷的方式，是在直接输出对象时自动调用的方法。
       对象的引是一个指针，直接输出`$p = new Person()  $p`是一个引用，直接输出会报错。
       ```
       public function __toString(){
           return $this;
       }
       ```
     - **__call()**
       如果尝试调用对象中不存在的方法一定会报错，并退出程序不能继续执行。
       而__call()方法就是在调用对象不存在的方法时自动调用。所以可以借助__call()来提示用户。
       ```
       function __call($name, $arguments)
        {
          // TODO: Implement __call() method.
          echo '你所调用的函数'.$name.'不存在'.$arguments;
        }
       ```
     - **自动加载类**
       通常每个类的定义都会单独的建立一个php源文件。当你尝试使用一个未定义的类时，php会报告一个致命错误。可以用include包含一个类所在的源文件，但如果一个页面用到多个类，就不得不在脚本页面开头编写一个长长的包含文件的列表。不仅烦琐而且容易出错。
       php提供了类自动加载的功能。当你尝试使用一个php没有组织到的类时，它会寻找一个__autoload()的全局函数。如果存在，就会自动调用。
       ```
       function __autoload($classname){
           include(strtolower($classname).".class.php");
       }
       ```
     - **对象的串行化**
       对象也是一种在内存中的数据类型，他的寿命通常随着生成该对象的程序的终止而终止。有时候可能需要将对象的状态保存下来，需要时在对对象进行恢复。对象通过写出自己描述自己状态的数值来记录自己，这个过程叫做对象的串行化。
       通常使用串行化的情况：
       1.对象需要在网络中传输时，将对象串化转化为二进制的字符串。
       2.对象需要持久保存时，将对象串化后写入文件或是数据库中。
       ```
       $personString = serialize($person)
       ```
##抽象类与接口
   一个类可以有一个类或多个子类，而每一个类都有至少一个共有方法作为外部访问的接口。而抽象方法就是为了方便继承而引入的。
   抽象方法就是没有方法体方法。就是指在声明方法时花括号中并没有内容。在声明抽象方法时使用关键字abstract。
   - **抽象类**
     只要在声明类时有一个方法是抽象的方法，那么这个类就是抽象类。
     使用抽象类就包含了继承关系，他是为它的子类定义公共接口。
   - **接口技术**
     因为php只支持单继承，也就是说每个类只能继承一个父类。当声明的新类继承抽象类实例实现模板以后，他就不能再有父类了。为了解决这个问题，php引入了接口。接口是一种特殊的抽象类，而抽象类又是一种特殊的类，所以接口也是一种特殊的类。
     ```
     interface test{    //interface 声明接口
        const  A = 'test';
        function  say();
        function  run();
     }   
     interface add extends test { //声明一个接口对test进行扩展
        const  news = 'this is your add';
        function eat();
     }
     ```
     如果需要使用接口中的成员，则需要通过子类去实现接口中的全部抽象方法，然后创建子类的对象去调用在子类中实现后的方法。但通过类的继承接口时需要使用implements关键字实现，而不是extends。如果需要使用抽象类去实现接口中的部分方法，也需要使用implements。
     ```
     abstract  class  xiaoLiu implements  add{
          function say()
          {
             // TODO: Implement say() method.
             echo "i am eating";
          }
      }
     ```
     php是单继承，一个类只能有一个父类，但是一个类可以实现多个接口。
     ```
     class 类名 implements 接口一，接口二，...,接口n{

     }
     class 类名 extends 父类名 implements 接口一，接口二，...，接口n{

     }
     ```
## 多态性的应用
多态是面向对象的三大特性中除封装和继承之外的另一重要的特性。它展示了动态的数据绑定的功能。也称为"同名异式"。多态性的功能可以让软件在开发和维护过程中，达到充分的延伸性。事实上多态最直接的定义就是让具有继承关系的不同对象，可以对相同的名称的成员函数调用，产生不同的效果。
所谓多态性就是只一段代码具有处理多种类型对象的能力。在php中多态性值得就是方法的重写。
```
interface USB{
    function run();
}

class Computer{
    function useUSB($user){
        $user->run();
    }
}

abstract class Umouse implements USB{
    public function run()
    {
        // TODO: Implement run() method.
        echo 'mouse is running';
    }
}


$computer = new Computer();
```

