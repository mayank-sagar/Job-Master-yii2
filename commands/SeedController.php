<?php

namespace app\commands;
use yii\console\Controller;
use app\models\User;
use app\models\Job;
use app\models\Category;
use yii;
class SeedController extends Controller
{

    private $userIds = [];
    private $categoryPhp = null;
    private $categoryJavascript = null;
    private $categoryAngular = null;
    private $categoryReact = null;
    private $categoryLaravel = null;
    private $categoryYii = null;

    public function actionCategories()
    {


        $category = new Category();
        $category->name = "Php Developer";
        $category->slug = "php-developer";
        $category->save();
        $this->categoryPhp = $category->id;

    
        $category = new Category();
        $category->name = "Javascript Developer";
        $category->slug = "javascript-developer";
        $category->save();
        $this->categoryJavascript = $category->id;
        
        $category = new Category();
        $category->name = "Angular Developer";
        $category->slug = "angular-developer";
        $category->save();
        $this->categoryAngular = $category->id;
        

        $category = new Category();
        $category->name = "React Developer";
        $category->slug = "react-developer";
        $category->save();
        $this->categoryReact = $category->id;
        

        $category = new Category();
        $category->name = "Laravel Developer";
        $category->slug = "laravel-developer";
        $category->save();
        $this->categoryLaravel = $category->id;

        $category = new Category();
        $category->name = "yii Developer";
        $category->slug = "yii-developer";
        $category->save();
        $this->categoryYii = $category->id;

    }

    public function actionIndex()
    {

       echo "Running Users Seed\n"; 
       $this->actionUsers();
       echo "Done Running Users Seed\n";

       echo "Running Categories Seed\n"; 
       $this->actionCategories();
       echo "Done Categories Seed\n";

       echo "Running Jobs Seed\n"; 
       $this->actionJobs();
       echo "Done Jobs Seed\n";

       echo "All seeds completed successfuly.";
    }

    public function actionJobs()
    {
        $job = new Job();
        $job->category_id = $this->categoryPhp;
        $job->user_id = $this->userIds[random_int(0,count($this->userIds) - 1) ];
        $job->title = 'Expert Php Developer';
        $job->description = 'A PHP developer is responsible for writing server-side web application logic. PHP developers usually develop back-end components, connect the application with the other (often third-party) web services, and support the front-end developers by integrating their work with the application. They are also often required to develop and integrate plugins for certain popular frameworks.';
        $job->type = 'full_time';
        $job->requirements = 'Laravel, Codeignitor and Yii are required.';
        $job->salary_range = '10000 to 20000';
        $job->city = 'New York';
        $job->address = 'Street 334, New Line , New York USA.';
        $job->contact_email = 'contact@telsoft.com';
        $job->contact_phone = '123456789798';
        $job->is_published = 1;
        $job->skipUser = true; 
        $job->save(false);


        $job = new Job();
        $job->category_id = $this->categoryJavascript;
        $job->user_id =$this->userIds[random_int(0,count($this->userIds) - 1) ];
        $job->title = 'Expert Javascript Developer';
        $job->description = 'A JavaScript developer is responsible for implementing the front-end logic that defines the behavior of the visual elements of a web application. A JavaScript developer is also responsible for connecting this with the services that reside on the back-end. They are usually supported by back-end web developers, who are responsible for server-side application logic. JavaScript developers often work alongside other front-end web developers who specialize in markup and styling.';
        $job->type = 'full_time';
        $job->requirements = 'React , Angular and Vue are required.';
        $job->salary_range = '10000 to 20000';
        $job->city = 'New York';
        $job->address = 'Street 335, New Line , New York USA.';
        $job->contact_email = 'contact@telonesol.com';
        $job->contact_phone = '123456789776';
        $job->is_published = 1;
        $job->skipUser = true; 
        $job->save(false);

        $job = new Job();
        $job->category_id = $this->categoryAngular;
        $job->user_id =$this->userIds[random_int(0,count($this->userIds) - 1) ];
        $job->title = 'Expert Angular Developer';
        $job->description = 'AngularJS developers are skilled JavaScript developers who are also well acquainted with some theoretical concepts of software engineering. Unlike some other JavaScript frameworks, AngularJS requires the developer to do things the “Angular” way, which is a set of rules and practices that allow developers to make the best use of the framework and build robust efficient web applications. This makes it necessary for developers to actually know AngularJS inside-out, and not just be a great JavaScript programmer.';
        $job->type = 'full_time';
        $job->requirements = 'Angular 12 required.';
        $job->salary_range = 'Above $50000';
        $job->city = 'New York';
        $job->address = 'Street 336, New Line , New York USA.';
        $job->contact_email = 'contact@tel2user.com';
        $job->contact_phone = '123456789731';
        $job->is_published = 1;
        $job->skipUser = true; 
        $job->save(false);


        $job = new Job();
        $job->category_id = $this->categoryReact;
        $job->user_id = $this->userIds[random_int(0,count($this->userIds) - 1) ];
        $job->title = 'Expert React Developer';
        $job->description = 'React.js, a comprehensive JavaScript library for building user interfaces, has changed the way we think about front-end development. React.js has grasped the interest of the open source community and it is here to stay. However, the nuances and idiosyncrasies of React.js require extra caution when distinguishing between good JavaScript developers and true experienced React.js developers.';
        $job->type = 'full_time';
        $job->requirements = 'React and React Redux required.';
        $job->salary_range = 'Above $50000';
        $job->city = 'New York';
        $job->address = 'Street 126, New Line , New York USA.';
        $job->contact_email = 'contact@telmeuser.com';
        $job->contact_phone = '123456789345';
        $job->is_published = 1;
        $job->skipUser = true; 
        $job->save(false);

        $job = new Job();
        $job->category_id = $this->categoryLaravel;
        $job->user_id = $this->userIds[random_int(0,count($this->userIds) - 1) ];
        $job->title = 'Expert Laravel Developer';
        $job->description = "Laravel developers use the Laravel web framework to design and build web applications, services, sites, and tools. Laravel is a PHP-based, MVC architecture that relies on OOP to create websites, databases, forums, and caches. The framework's tools and libraries let Laravel developers quickly develop robust software that is scalable.";
        $job->type = 'full_time';
        $job->requirements = 'Php and Laravel Required.';
        $job->salary_range = 'Above $50000';
        $job->city = 'New York';
        $job->address = 'Street 226, New Line , New York USA.';
        $job->contact_email = 'contact@teleuser.com';
        $job->contact_phone = '123456789334';
        $job->is_published = 1;
        $job->skipUser = true; 
        $job->save(false);


        $job = new Job();
        $job->category_id = $this->categoryYii;
        $job->user_id = $this->userIds[random_int(0,count($this->userIds) - 1) ];
        $job->title = 'Expert Yii2 Developer';
        $job->description = "Build and implement web applications and back-end services that integrate with mobile applications. Rapidly address issues and fix defects discovered during deployment. Build reusable code and libraries for future use & Optimize application for maximum speed and scalability.";
        $job->type = 'full_time';
        $job->requirements = 'Php and Yii2 required.';
        $job->salary_range = '10000 to 20000';
        $job->city = 'New York';
        $job->address = 'Street 236, New Line , New York USA.';
        $job->contact_email = 'contact@tele45user.com';
        $job->contact_phone = '123456789334';
        $job->is_published = 1;
        $job->skipUser = true; 
        $job->save(false);

        // Replication of 5 of above with slight changes
        
        $job = new Job();
        $job->category_id = $this->categoryPhp;
        $job->user_id = $this->userIds[random_int(0,count($this->userIds) - 1) ];
        $job->title = 'Pro Php Developer';
        $job->description = 'A PHP developer is responsible for writing server-side web application logic. PHP developers usually develop back-end components, connect the application with the other (often third-party) web services, and support the front-end developers by integrating their work with the application. They are also often required to develop and integrate plugins for certain popular frameworks.';
        $job->type = 'full_time';
        $job->requirements = 'Laravel, Codeignitor and Yii are required.';
        $job->salary_range = '10000 to 20000';
        $job->city = 'New York';
        $job->address = 'Street 304, New Line , New York USA.';
        $job->contact_email = 'contact@soft.com';
        $job->contact_phone = '123456789789';
        $job->is_published = 1;
        $job->skipUser = true; 
        $job->save(false);


        $job = new Job();
        $job->category_id = $this->categoryJavascript;
        $job->user_id = $this->userIds[random_int(0,count($this->userIds) - 1) ];
        $job->title = 'Pro Javascript Developer';
        $job->description = 'A JavaScript developer is responsible for implementing the front-end logic that defines the behavior of the visual elements of a web application. A JavaScript developer is also responsible for connecting this with the services that reside on the back-end. They are usually supported by back-end web developers, who are responsible for server-side application logic. JavaScript developers often work alongside other front-end web developers who specialize in markup and styling.';
        $job->type = 'full_time';
        $job->requirements = 'React , Angular and Vue are required.';
        $job->salary_range = '10000 to 20000';
        $job->city = 'New York';
        $job->address = 'Street 335, New Line , New York USA.';
        $job->contact_email = 'contact@onesol.com';
        $job->contact_phone = '123456789789';
        $job->is_published = 1;
        $job->skipUser = true; 
        $job->save(false);

        $job = new Job();
        $job->category_id = $this->categoryAngular;
        $job->user_id =$this->userIds[random_int(0,count($this->userIds) - 1) ];
        $job->title = 'Pro Angular Developer';
        $job->description = 'AngularJS developers are skilled JavaScript developers who are also well acquainted with some theoretical concepts of software engineering. Unlike some other JavaScript frameworks, AngularJS requires the developer to do things the “Angular” way, which is a set of rules and practices that allow developers to make the best use of the framework and build robust efficient web applications. This makes it necessary for developers to actually know AngularJS inside-out, and not just be a great JavaScript programmer.';
        $job->type = 'full_time';
        $job->requirements = 'Angular 12 required.';
        $job->salary_range = 'Above $50000';
        $job->city = 'New York';
        $job->address = 'Street 337, New Line , New York USA.';
        $job->contact_email = 'contact@tel45.com';
        $job->contact_phone = '123456789734';
        $job->is_published = 1;
        $job->skipUser = true; 
        $job->save(false);


        $job = new Job();
        $job->category_id = $this->categoryReact;
        $job->user_id = $this->userIds[random_int(0,count($this->userIds) - 1) ];
        $job->title = 'Pro React Developer';
        $job->description = 'React.js, a comprehensive JavaScript library for building user interfaces, has changed the way we think about front-end development. React.js has grasped the interest of the open source community and it is here to stay. However, the nuances and idiosyncrasies of React.js require extra caution when distinguishing between good JavaScript developers and true experienced React.js developers.';
        $job->type = 'full_time';
        $job->requirements = 'React and React Redux required.';
        $job->salary_range = 'Above $50000';
        $job->city = 'New York';
        $job->address = 'Street 125, New Line , New York USA.';
        $job->contact_email = 'contact@telsometech.com';
        $job->contact_phone = '123456789334';
        $job->is_published = 1;
        $job->skipUser = true; 
        $job->save(false);

        $job = new Job();
        $job->category_id = $this->categoryLaravel;
        $job->user_id = $this->userIds[random_int(0,count($this->userIds) - 1) ];
        $job->title = 'Pro Laravel Developer';
        $job->description = "Laravel developers use the Laravel web framework to design and build web applications, services, sites, and tools. Laravel is a PHP-based, MVC architecture that relies on OOP to create websites, databases, forums, and caches. The framework's tools and libraries let Laravel developers quickly develop robust software that is scalable.";
        $job->type = 'full_time';
        $job->requirements = 'Php and Laravel Required.';
        $job->salary_range = 'Above $50000';
        $job->city = 'New York';
        $job->address = 'Street 226, New Line , New York USA.';
        $job->contact_email = 'contact@tele45user.com';
        $job->contact_phone = '123456789334';
        $job->is_published = 1;
        $job->skipUser = true; 
        $job->save(false);


    }

    public function actionUsers()
    {
        $user = new User();
        $user->name = "mayank";
        $user->username = "Mayank Sagar";
        $user->email = "mayanksagar226@gmail.com";
        $user->password = 'password';
        $user->status = 1;
        $user->role = 'admin';
        $user->save(false);
       
        $user = new User();
        $user->name = "danial";
        $user->username = "Danial";
        $user->email = "danial@yopmail.com";
        $user->password = 'password';
        $user->status = 1;
        $user->role = 'user';
        $user->save(false);
        $this->userIds[] = $user->id;

        $user = new User();
        $user->name = "Silvia";
        $user->username = "Silvia HR";
        $user->email = "silvia@yopmail.com";
        $user->password = 'password';
        $user->status = 1;
        $user->role = 'user';
        $user->save(false);
        $this->userIds[] = $user->id;
    }

}
