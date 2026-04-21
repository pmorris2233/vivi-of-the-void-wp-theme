#!/bin/bash

working_dir="/home/dh_qi7i23/viviofthevoid.com"
wp_dir="/home/paul/www/viviofthevoid"
host="dreamhost"
sql_file="votv.sql"
download_path="/home/paul/Downloads"
prod_url="https://www.viviofthevoid.com"
dev_url="http://votv.localhost:8080"

ssh $host /bin/bash << EOF
	cd $working_dir	

	if [ -f $sql_file ]; then
		rm $sql_file
	fi

	wp db export votv.sql --add-drop-table
EOF

if [ -f "${download_path}/${sql_file}" ]; then
	rm "${download_path}/${sql_file}"
fi

scp "${host}:${working_dir}/${sql_file}" $download_path

cd $wp_dir

wp db import "${download_path}/${sql_file}"
wp search-replace "${prod_url}" "${dev_url}"

exit 0
