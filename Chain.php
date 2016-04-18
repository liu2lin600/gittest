<?php
/**
 * Created by PhpStorm.
 * User: liull
 * Date: 2016-3-16
 * Time: 15:27
 */
interface ICommand{
    function onCommand( $name, $args );
}

class CommandChain{
    private $_commands = array();

    public function addCommand( $cmd ){
        $this->_commands []= $cmd;
    }

    public function runCommand( $name, $args ){
        foreach( $this->_commands as $cmd ) {
            if ( $cmd->onCommand( $name, $args ) )
                return;
        }
    }
}

class UserCommand implements ICommand{
    public function onCommand( $name, $args ){
        if ( $name != 'addUser' ) return false;
        echo( "UserCommand handling 'addUser'\n" );
        return true;
    }
}

class MailCommand implements ICommand{
    public function onCommand( $name, $args ){
        if ( $name != 'mail' ) return false;
        echo( "MailCommand handling 'mail'\n" );
        return true;
    }
}

$cc = new CommandChain();
$cc->addCommand( new UserCommand() );
$cc->addCommand( new MailCommand() );
$cc->runCommand( 'addUser', null );
$cc->runCommand( 'mail', null );

/* 此代码定义维护 ICommand 对象列表的 CommandChain 类。两个类都可以实现 ICommand 接口
 * 一个对邮件的请求作出响应，另一个对添加用户作出响应
 * 代码首先创建 CommandChain 对象，并为它添加两个命令对象的实例。然后运行两个命令以查看谁对这些命令作出了响应。
 * 如果命令的名称匹配 UserCommand 或 MailCommand，则代码失败，不发生任何操作
 */