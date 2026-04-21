#!/usr/bin/env bash

if [ ! -f ".env" ]; then
	echo "[-] Missing config: '.env' not found"
	exit 1
fi

source .env

echo '[!] Pulling database'

ssh ${votv_config[host]} /bin/bash << EOF
	cd ${votv_config[remote_dir]}	

	if [ -f ${votv_config[sql_file]} ]; then
		rm ${votv_config[sql_file]}
	fi

	wp db export ${votv_config[sql_file]} --add-drop-table
EOF

if [ -f "${votv_config[download_path]}/${votv_config[sql_file]}" ]; then
	rm "${votv_config[download_path]}/${votv_config[sql_file]}"
fi

remote_file="${votv_config[host]}:${votv_config[remote_dir]}/${votv_config[sql_file]}"

scp $remote_file ${votv_config[download_path]}

cd ${votv_config[local_wp_dir]}

wp db import "${votv_config[download_path]}/${votv_config[sql_file]}"
wp search-replace "${votv_config[prod_url]}" "${votv_config[dev_url]}"

echo '[+] DB pull complete'

exit 0
