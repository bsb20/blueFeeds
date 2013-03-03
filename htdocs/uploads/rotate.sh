#!/bin/bash
	for i in $1
		do convert -rotate $2 $i $i
	done 

mogrify -strip $1
