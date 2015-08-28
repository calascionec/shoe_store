# Shoe Stores

##### A list of shoe stores and the brands that they carry, 08/28/15

#### By Christopher Calascione

## Description

This app allows users to add shoe stores and add the brands of shoes that each store carries.

## Setup

1. Clone this repository
2. Run $ composer install in project directory
3. Start MySql and Apache servers
4. Add shoes database to MySQL databases:
    1. CREATE DATABASE shoes;
    2. USE shoes;
    3.CREATE TABLE stores (id SERIAL PRIMARY KEY, name VARCHAR(255), location VARCHAR (255));
    4.CREATE TABLE brand (id SERIAL PRIMARY KEY, name VARCHAR (255));

5. Start PHP server in web directory
6. Navigate to localhost:8000
7. Enjoy!

## Technologies Used

PHP, MYSQL, PHPUnit, Silex, Twig, HTML, CSS, Bootstrap

### Legal

Copyright (c) 2015 Christopher Calascione

This software is licensed under the MIT license.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
