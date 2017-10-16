<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use app\components\MyController;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use common\models\Product;
use common\models\UserAddress;
use yii\filters\ContentNegotiator;
use yii\web\Response;
use yii\web\NotFoundHttpException;

/**
 * Site controller
 */
class StoreController extends MyController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
            'contentNegotiator' => [
                'class' => ContentNegotiator::className(),
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
                'only' => ['getitem'],
            ],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $productNew = Product::find()->where(['group' => 1])->all();
        return $this->render('index', [
            'new' => $productNew,
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    /*public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }*/

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
    
    public function actionRegister() {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }
        return $this->render('register', [
            'model' => $model,
        ]);
    }
    public function actionSignin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {
            if(isset(Yii::$app->request->post()['remember'])){
                $model->rememberMe = true;
            }
            else{
                $model->rememberMe = FALSE;
            }
            if($model->login()){
                if(isset(Yii::$app->request->get()['r'])){
                    return $this->redirect(Yii::$app->request->get()['r']);
                }
                return $this->goBack();
            }
        }
        return $this->render('signin', [
            'model' => $model,
        ]);
    }
    /*public function actionCategory() {
        return $this->render('category', [
            //'model' => $model,
        ]);
    }*/
    
    public function actionCheckout(){
        return $this->render('checkout', [
            //'model' => $model,
        ]);
    }
    public function actionCart($slug=null) {
        $err = FALSE;
        //$step = $slug;
        if(isset(Yii::$app->request->get()['e']) && Yii::$app->request->get()['e'] == 1){
            $err = TRUE;
        }
        if(!$slug){
            return $this->render('cart', [
                'err' => $err,
                'step' => $slug,
            ]);
        }
        else if($slug == 'address'){
            $newaddress = new UserAddress();
            $address = $this->genAddress();
            $addmodel = new \yii\base\DynamicModel(['address']);
            $addmodel->addRule(['address'], 'string', ['min' => 1]);
            $addmodel->addRule(['address'], 'required', ['message' => 'กรุณาเลือก {attribute}']);
            if ($newaddress->load(Yii::$app->request->post())) {
                $newaddress->id_user = \yii::$app->user->id;
                if($newaddress->save()){
                    return $this->redirect('/store/cart/address');
                }
            }
            if ($addmodel->load(Yii::$app->request->post()) && $addmodel->validate()) {
                $orderaddModel = \common\models\ProductOrder::findOne(['id_user'=> \yii::$app->user->id, 'status'=>0]);
                $orderaddModel->address = $addmodel->address;
                $orderaddModel->status = 1;
                $orderaddModel->description = 'add address';
                if($orderaddModel->save()){
                //var_dump($addmodel);exit();
                    return $this->redirect('/store/cart/confirm');
                }
            }
            return $this->render('cart/address', [
                'err' => $err,
                'newaddress' => $newaddress,
                'address' => $address,
                'addmodel' => $addmodel,
                'step' => $slug,
        ]);
        }
        else if($slug == 'confirm'){
            return $this->render('cart/confirm', [
                'err' => $err,
                'step' => $slug,
            ]);
        }
        else if($slug == 'payment'){
            return $this->render('cart/payment', [
                'err' => $err,
                'step' => $slug,
            ]);
        }
        else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionCreateOrder() {
        $redirect = '/store/cart/create-order';
        
        $model = \common\models\ProductOrder::findOne(['id_user'=> \yii::$app->user->id, 'status'=>0]);
        if(!$model){
            $model = new \common\models\ProductOrder();
        }
        $model->address = 0;
        $model->id_user = \yii::$app->user->id;
        $model->price = 0;
        $model->discount = 0;
        $model->total = 0;
        $model->quantity = 0;
        $model->description = 'prepare order';
        $model->create_at = date("Y-m-d H:i:s");
        $model->create_ip = \yii::$app->request->userIP;
        $model->status = 0;
        
        if($this->isLogin($redirect)){
            //check login & redirect
        }
        else if($model->save()){
            return $this->redirect('/store/cart/address');
        }
        else{
            return $this->redirect('/store/cart?e=1');
        }
    }
    
    protected function genAddress() {
        $data = [];
        $model = UserAddress::findAll(['id_user'=> \yii::$app->user->id]);
        if($model){
            foreach ($model as $key => $row) {
                $add = '';
                if($row->number){
                    $add .= 'เลขที่ ' . $row->number . ' ';
                }
                if($row->building){
                    $add .= 'อาคาร ' . $row->building . ' ';
                }
                if($row->soi){
                    $add .= 'ซอย ' . $row->soi . ' ';
                }
                if($row->road){
                    $add .= 'ถนน ' . $row->road . ' ';
                }
                if($row->mu){
                    $add .= 'หมู่ ' . $row->mu . ' ';
                }
                if($row->district){
                    $add .= $row->district . ' ';
                }
                if($row->amphoe){
                    $add .= $row->amphoe . ' ';
                }
                if($row->province){
                    $add .= $row->province . ' ';
                }
                if($row->zipcode){
                    $add .= $row->zipcode . ' ';
                }
                $data[$row->id] = $add;
            }
        }
        return $data;
    }
    
    
    //AJAX
    public function actionGetitem() {
        if(isset(Yii::$app->request->post()['selected'])){
            $item = Product::findOne(Yii::$app->request->post()['selected']);
            
            if($item){
                if(!$item->image){
                    $detail = \common\models\ProductDetail::findOne(['id_product' => $item->id]);
                    $item->image = $detail->images;
                }
                return $item;
            }
        }
        return 0;
    }
    
    public function actionSizelist($q = null, $id = null, $did = null) {
        //print_r($did);
        //var_dump($id);
        
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        /*if (!is_null($q)) {
            $query = new Query;
            $query->select('id, all AS text')
                ->from('db_product_detail')
                ->where(['id' => $did])
                ->limit(20);
            $command = $query->createCommand();
            //$data = $command->queryAll();
            $data = $command->queryOne();
            $out['results'] = array_values($data);
        }
        elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => City::find($id)->name];
        }*/
        //$did = 5;
        
        if (!is_null($did)) {
            $chain = explode("-",$did);
            $detail = \common\models\ProductDetail::findOne(["id_product"=>$chain[0], "color"=>$chain[1]]);
            $all = json_decode($detail->all);
            $size = [];
            foreach ($all as $key => $row) {
                array_push($size, ['id' => $detail->color.$key, 'text' => $row->size]);
            }
            //var_dump($size);
            $out['results'] = $size;
        }
        return $out;
    }
    public function actionCheckoutproduct() {
        //return Yii::$app->request->post();
        if(Yii::$app->request->post()){
            $product = json_decode(Yii::$app->request->post()['p']);
            //var_dump($product);
            $flag = true;
            $qt = 0;
            $price = 0;
            if($product){
                $order = \common\models\ProductOrder::findOne(['id_user'=> \yii::$app->user->id, 'status'=>1]);
                if($order){
                    foreach ($product as $item) {
                        $itemModel = new \common\models\ProductOrderItems();
                        $itemModel->id_product = $item->pid;
                        $itemModel->id_product_order = $order->id;
                        $itemModel->name = $item->name;
                        if(isset($item->color)){
                            $itemModel->color = $item->color;
                        }
                        if(isset($item->size)){
                            $itemModel->size = $item->size;
                        }
                        $itemModel->quantity = $item->quantity;
                        if($itemModel->save()){
                            $qt += $item->quantity;
                            $price += $item->price;
                        }else{
                            $flag = FALSE;
                        }
                    }
                    if($flag){
                        $order->price = $price;
                        $order->discount = 0;
                        $order->total = $order->price-$order->discount;
                        $order->quantity = $qt;
                        $order->description = 'confirm order';
                        $order->status = 2;
                        if($order->save()){
                            return 1;
                        }
                    }
                }
            }
        }
        return 0;
    }
}
