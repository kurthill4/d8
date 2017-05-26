<html>
  <head>
    <link rel="stylesheet" href="/faculty/jcouture/current/stylesheet.css" type="text/css" media="screen">
    <link rel="stylesheet" href="/faculty/jcouture/current/print.css" type="text/css" media="print">
    <SCRIPT language="JavaScript" src="/faculty/jcouture/current/funcjava.js"></SCRIPT>  
    <!-- #include virtual="root/faculty/jcouture/current/funcvb.asp" -->
  </head>
  <body>
  
  
  
<%
  ' Declare some variables
  Dim strPrgmPath, fso, objCurFile, fileParent
   
  ' Instantiate a File System Object
  Set objFSO = CreateObject("Scripting.FileSystemObject")
  
  ' Get the path of the current file
  strFilePath = Request.ServerVariables("PATH_TRANSLATED")  
  
  ' Get the details about this file 
  Set objCurFile = objFSO.GetFile(strFilePath)
  
  ' Sample Data Elements
  x=false
  if x = true then
     rl("<table border='1' bordercolor='red'>")
     prtRow "Name:",objCurFile.name
     prtRow "Path:", objCurFile.Path
     prtRow "Date Created:",objCurFile.DateCreated
     prtRow "Last Accessed:",objCurFile.DateLastAccessed
     prtRow "Last Modified:",objCurFile.DateLastModified
     prtRow "Drive:", objCurFile.Drive
     prtRow "Parent Folder:",objCurFile.parentfolder
     prtRow "Short Name:",objCurFile.shortname
     prtRow "Short Path:",objCurFile.shortPath
     prtrow "Size:",objCurFile.size
     prtrow "Type:",objCurFile.type
  
     ' Extract just the directory information
     Set fileParent = objFSO.getFolder(objCurFile.ParentFolder) 
     prtRow "The folder name is:",fileParent.Name

     ' Show the full path to the new file 
     prtRow "The new file path is:", objCurFile.parentfolder & "\" & strNewFile
     rl("</table>")
  end if
  
  
  
  Set fileParent = objFSO.getFolder(objCurFile.ParentFolder) 
  rl("<table border='1' bordercolor='blue' cellpadding='10'></tr>")
  rl("<tr><th colspan='4'>Folder: " & fileParent.Name & "</th></tr>")
  rl("<tr><th>Name</th><th>Type</th></tr>")
  
  ' Get a list of folders in the current folder
  '----------------------------------------------------------------------------
  Set f_Folder = objFSO.getFolder(objCurFile.ParentFolder)
  for each f1 in f_Folder.SubFolders
      rl("<tr><td colspan='2'><b>Sub-Folder:  </b><a href='" & f1.name & "' >" & f1.name & "</a></td></tr>")
  next
  

  ' Get a list of files in the current folder 
  ' The type tells you what kind of extension it has
  '----------------------------------------------------------------------------
  Set f_Folder = objFSO.getFolder(objCurFile.ParentFolder)
  Set f_Files = f_Folder.Files
  for each f1 in f_Files
      rl("<tr>")      
        rl("<td rowspan='3'><a href='" & f1.Name & "'>")
        if InStr(f1.type,"Image") > 0 then
           rl("<img src='" & f1.name & "' width='200' height='200'>")
           rl("<br>" & f1.name)
        end if
        rl("</a></td>")
        rl("<td>" & f1.type & "</td>")
      rl("</tr>")
      rl("<tr><td>" & f1.DateCreated & "</td></tr>")
      if f1.Size > 1000000 then
         rl("<tr><td><font color='red'><b>Size: " & f1.Size & "</font></b></td></tr>")
      else
         rl("<tr><td> Size:" & f1.Size & "</td></tr>")
      end if   
  next

  ' Terminate the table
  response.write("</table>") 
  
  
'********************************
' PRTROW
'********************************
function prtRow(strTitle,strData)
  response.write("<tr><td>")
  response.write(strTitle)
  response.write("</td><td>")
  response.write(strData)
  response.write("</td><td>")
  response.write(strData2)
  response.write("</td></tr>")
end function
function rl(strvar)
  response.write(strvar & vbcrlf)
end function

%>
</body>
</html>