<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use backend\models\User;

/**
 * Password reset request form
 */
class PasswordResetRequestForm extends Model
{
    public $email;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
       
        return [
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => 'backend\models\User',
                'filter' => ['status' => User::STATUS_ACTIVE],
                'message' => 'There is no user with this email address.'
            ],
        ];
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return bool whether the email was send
     */
    public function sendEmail()
    {
        /* @var $user User */
        $user = User::findOne([
            'status' => User::STATUS_ACTIVE,
            'email' => $this->email,
        ]);

        if (!$user) {
            return false;
        }
        
        if (!User::isPasswordResetTokenValid($user->password_reset_token)) {
            $user->generatePasswordResetToken();
            if (!$user->save()) {
                return false;
            }
        }
        // //send mail
        // $mail = new \backend\components\SendMail;
        // $id_user = $user['id'];//($_GET['origin'] == 'user' ? $_GET['id'] : 0);
        // //check Config Mail Company
        //     $ConfEmail = ConfEmail::checkConfCompany($id_user);
        //     if($ConfEmail){
        //         $mail->smtp      = $ConfEmail->host_smtp;
        //         $mail->port      = $ConfEmail->port;
        //         $mail->from      = $ConfEmail->from_email;
        //         $mail->pass      = $ConfEmail->password;
        //         $mail->fromName  = $ConfEmail->from_name;
        //         $mail->security  = (empty($ConfEmail->security) ? null : $ConfEmail->security);
        //     }
        //   print_r($ConfEmail)  ;die;
        // $subject  = 'Teste Envio de Email';
        // if($mail->send($user->email, $subject, "E-mail somente para testes!")){
        //         echo json_encode(['status' => 'success', 'message' => 'E-mail de Teste enviado para: ' . $user->email]);
        //     }else{
        //         echo json_encode(['status' => 'error', 'message' => 'Falha no envio']);
        //     }

        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Password reset for ' . Yii::$app->name)
            ->send();
        
    }
}
