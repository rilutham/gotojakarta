GoToJakarta
===========

Description
-----------

GoToJakarta is a C++ program to determine minimal path from several cities in West Java to Jakarta, Indonesia. It is useful for users to efficiency the travel time and cost. This program is an implementation of the A* algorithm (astar), you can learn more about A* algorithm [here](http://ow.ly/D1aZy).

How To Compile
--------------

Just simply run the following command:
	
	$ cd path/to/gotojakarta/directory
	$ make

Usage
-----
	
	./gotojakarta [start_city_name]

List of `start_city_name` can be found at west-java-map.png on images directory.
Example:
	
	$ ./gotojakarta Garut
	Pencarian rute terpendek menuju Jakarta ditemukan!
	Berikut kota-kota yang harus dilalui:
	 Garut
	 Bandung
	 Cimahi
	 Purwakarta
	 Karawang
	 Bekasi
	 Jakarta
	Langkah Solusi : 6
	Jumlah langkah pencarian : 9


License
-------
This program is released under the MIT License, see LICENSE.
