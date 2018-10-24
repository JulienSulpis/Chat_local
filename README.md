<h1 align="center">Chat Application</h1>

<p align="center"><img src="https://raw.githubusercontent.com/jsulpis/chat-app/master/preview.png" alt="preview image"/></a>
</p>

## Introduction
This is a small project I made for a MOOC on PHP on OpenClassrooms.com. I used assets from the WAMP server for the interface and PHP to interact with a MySQL database which hosts the messages.

## Installation

### Requirements
You will need an Apache server and a MySQL database to run this application. You can use for example [WAMP](http://www.wampserver.com/), [MAMP](https://www.mamp.info/en/) or [LAMP](https://www.linux.com/learn/easy-lamp-server-installation) respectively for Windows, MacOS and Linux.

### Install

After installing your Apache server, go into your www repository and download the project, either the zip archive or by cloning it.

```
git clone https://github.com/jsulpis/chat-app.git
```

You also have to create the database and table. In your database admin interface (phpmyadmin for example), create a database named "me" and a table named "mini_chat". Create 4 columns: ID (int, primary key, auto-increment), pseudo (varchar), message (varchar) and date_message(datetime). 

When you are done, go to [http://localhost/chat-app](http://localhost/chat-app) and you should be able to use the chat.

## Warning

This is an old project with interface and comments in french and a very bad code architecture. I keep it as an archive but you should not reuse it for your own projects.

## License

Released under the [MIT](https://github.com/jsulpis/chat-app/blob/master/LICENSE) license.
