<?php 

$config = array(
        'Admin_form' => array(
                array(
                        'field' => 'Admin_name',
                        'label' => 'Admin Name',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'Password',
                        'label' => 'Password',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'Password_conf',
                        'label' => 'Password Confirmation',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'Admin_email',
                        'label' => 'Admin Email',
                        'rules' => 'required'
                )
        ),
        'Category_form' => array(
                array(
                        'field' => 'category',
                        'label' => 'Category',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'category_data',
                        'label' => 'Category_Data',
                        'rules' => 'required'
                )
        ),
        'Add_Question_form' => array(
                array(
                        'field' => 'category',
                        'label' => 'Category',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'question',
                        'label' => 'Question_Data',
                        'rules' => 'required'
                )
        ),
        'Post_form' => array(
                array(
                        'field' => 'postname',
                        'label' => 'Postname',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'categoryname',
                        'label' => 'Category',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'editor1',
                        'label' => 'PostData',
                        'rules' => 'required'
                )

        ),
        'Topic_form' => array(
                array(
                        'field' => 'postname',
                        'label' => 'Postname',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'categoryname',
                        'label' => 'Category',
                        'rules' => 'required'
                )

        ),

        'User_form' => array(
                array(
                        'field' => 'user_name',
                        'label' => 'User Name',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'user_password',
                        'label' => 'Password',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'cuser_password',
                        'label' => 'Password Confirmation',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'user_email',
                        'label' => 'User Email',
                        'rules' => 'required'
                )
        ),
        'upload_form' => array(
                array(
                        'field' => 'title',
                        'label' => 'Title',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'categoryname',
                        'label' => 'Category_Name',
                        'rules' => 'required'
                )
        ),
        'edit_form' => array(
                array(
                        'field' => 'editor2',
                        'label' => 'PostData',
                        'rules' => 'required'
                )

        )
);

 ?>