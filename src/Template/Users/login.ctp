<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style>
    /*
 *  * Specific styles of signin component
 *   */
    /*
 *      * General styles
 *           */
    body, html {
        height: 100%;
        background-repeat: no-repeat;
        background-image: linear-gradient(rgb(180, 135, 44), rgb(214, 219, 223));
    }

    .card-container.card {
        max-width: 350px;
        padding: 40px 40px;
    }

    .btn {
        font-weight: 700;
        height: 36px;
        -moz-user-select: none;
        -webkit-user-select: none;
        user-select: none;
        cursor: default;
    }

    /*
 *      * Card component
 *           */
    .card {
        background-color: #F7F7F7;
        /* just in case there no content*/
        padding: 20px 25px 30px;
        margin: 0 auto 25px;
        margin-top: 50px;
        /* shadows and rounded borders */
        -moz-border-radius: 2px;
        -webkit-border-radius: 2px;
        border-radius: 2px;
        -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    }

    .profile-img-card {
        width: 96px;
        height: 96px;
        margin: 0 auto 10px;
        display: block;
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        border-radius: 50%;
    }

    /*
 *      * Form styles
 *           */
    .profile-name-card {
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        margin: 10px 0 0;
        min-height: 1em;
    }

    .reauth-email {
        display: block;
        color: #404040;
        line-height: 2;
        margin-bottom: 10px;
        font-size: 14px;
        text-align: center;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    .form-signin #inputEmail,
    .form-signin #inputPassword {
        direction: ltr;
        height: 44px;
        font-size: 16px;
    }

    .form-signin input[type=email],
    .form-signin input[type=password],
    .form-signin input[type=text],
    .form-signin button {
        width: 100%;
        display: block;
        margin-bottom: 10px;
        z-index: 1;
        position: relative;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    .form-signin .form-control:focus {
        border-color: rgb(104, 145, 162);
        outline: 0;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
        box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
    }

    .btn.btn-signin {
        /*background-color: #4d90fe; */
        background-color: rgb(104, 145, 162);
        /* background-color: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));*/
        padding: 0px;
        font-weight: 700;
        font-size: 14px;
        height: 36px;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        border-radius: 3px;
        border: none;
        -o-transition: all 0.218s;
        -moz-transition: all 0.218s;
        -webkit-transition: all 0.218s;
        transition: all 0.218s;
    }

    .btn.btn-signin:hover,
    .btn.btn-signin:active,
    .btn.btn-signin:focus {
        background-color: rgb(12, 97, 33);
    }

    .forgot-password {
        color: rgb(104, 145, 162);
    }

    .forgot-password:hover,
    .forgot-password:active,
    .forgot-password:focus{
        color: rgb(12, 97, 33);
    }


    #footer .credits {
            font-size: 13px;
                    color: #888;
                        }
    
                           #footer .footer-links a {
                                   color: #666;
                                           padding-left: 15px;
                                                }
    
                                                   #footer .footer-links a:first-child {
                                                            padding-left: 0;
                                                                }
    
                                                                    #footer .footer-links a:hover {
                                                                            color: #1dc8cd;
                                                                                }
                                                                                </style>
                                                                                <?php
    
                                                                                /**
                                                                                 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
                                                                                  * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
                                                                                   *
                                                                                    * Licensed under The MIT License
                                                                                     * For full copyright and license information, please see the LICENSE.txt
                                                                                      * Redistributions of files must retain the above copyright notice.
                                                                                       *
                                                                                        * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
                                                                                        * @link          https://cakephp.org CakePHP(tm) Project
                                                                                          * @since         0.10.0
                                                                                           * @license       https://opensource.org/licenses/mit-license.php MIT License
                                                                                            */
    
                                                                                          $cakeDescription = 'Alpa';
                                                                                          ?>
                                                                                            <!DOCTYPE html>
                                                                                            <html>
                                                                                                <body>
    
                                                                                                       <div class="container">
                                                                                                                    <div class="card card-container">
                                                                                                                                    <img class="profile-img-card" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRvJLHP6ZZvscD_4k7s4Fq7rurj06oALOY0CdSuokbualzc5n2f" alt="" />
                                                                                                                                                                    <p id="profile-name" class="profile-name-card"></p>
                                                                                                                                                                                    <div class="form-signin">
                                                                                                                                                                                                        <span id="reauth-email" class="reauth-email"></span>
    
    
                                                                                                                                                                                                                            <!-- File: src/Template/Users/login.ctp -->
                                                                                                                                                                                                                                                <div class="">
                                                                                                                                                                                                                                                                        <div class="users form">
                                                                                                                                                                                                                                                                                        <?= $this->Flash->render() ?>
                                                                                                                                                                                                                                                                                                        <?= $this->Form->create() ?>
                                                                                                                                                                                                                                                                                                                                    <fieldset>
                                                                                                                                                                                                                                                                                                                                                                    <label style="margin-left: 60px; margin-bottom: 10px;">Consulta Ciudadana </label><br>
                                                                                                                                                                                                                                                                                                                                                                                                    <label style="margin-left: 20px; margin-bottom: 40px;">Ingrese su usuario y contraseña</label><br>
                                                                                                                                                                                                                                                                                                                                                                                                                                    <?= $this->Form->control('username') ?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <?= $this->Form->control('password') ?>
    
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              </fieldset>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <?= $this->Form->button(__('Entrar')); ?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <?= $this->Form->end() ?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div>  
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div><!-- /form -->
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </div><!-- /card-container -->
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div><!-- /container -->
    
   
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           </body>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           </html>
