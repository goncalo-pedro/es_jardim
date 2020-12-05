@extends('master')
<div class ="upload">
    <h1>Upload ficheiro excel</h1>
    <form action="/importExcel" method="post">
        <input type="file" id="myFile" name="filename">
        <input type="submit">
    </form>
</div>

