termisoc.org - nominations site
===============================

This is the HTML, CSS and PHP which was used for the exec nominations for the 2011-2012 academic year.

The HTML/CSS is based around [Less Framework](http://lessframework.com/). The design uses features of HTML5 and CSS3, but provides (basic) fallbacks for non-modern browsers. There is a mobile view facilitated through media queries.

Originally designed and coded by [Nick Charlton](http://nickcharlton.net/).
Licensed under the MIT license (below).

Usage
-----

This file depends upon a second file named `db-config.php`. It should define the database settings, similar to:

	// Define a set of global constants
	define("DBHOST", "");
	define("DBUSER", "");
	define("DBPASS", "");
	define("DB", "");

It also requires a database holding the values of:

Field	Type	Extra
id	int(50)	auto_inc
name	varchar(50)
email	varchar(50)
position	varchar(50)
second	varchar(50)

Licence
-------

Copyright (C) 2011 by Nick Charlton & TermiSoc (The University of Plymouth Computing Society)

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