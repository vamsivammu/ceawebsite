testcases = int(input())
res=[]
for i in range(testcases):
	firstrow = str(input())
	secondrow = str(input())
	thirdrow = str(input())
	if(secondrow[1]!="l"):
		if(thirdrow[1]!="l"):
			res.append("no")
		else:
			if(secondrow[0]=="l" and thirdrow[0]=="l"):
				res.append("yes")
			else:
				res.append("no")
	else:
		if(thirdrow[1]!="l"):
			if((firstrow[0]=="l" and secondrow[0]=="l") or (firstrow[1]=="l" and secondrow[2]=="l")):
				res.append("yes")
			else:
				res.append("no")
		else:
			if((firstrow[0]=="l" and secondrow[0]=="l") or (firstrow[1]=="l" and secondrow[2]=="l")):
				res.append("yes")
			elif((secondrow[0]=="l" and thirdrow[0]=="l") or (thirdrow[2]=="l")):
				res.append("yes")
			else:
				res.append("no")

			
for e in res:
	print(e)

	
	