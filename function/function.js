function removeRs(id)
{
    result = confirm("Apakah anda yakin menghapus ini?");
    if(result)
    {
        window.location = "function/deleterumahsakit.php?idrs="+ id;
    }

}

function removeArtikel(id,kdpenyakit)
{
    result = confirm("Apakah anda yakin menghapus ini?");
    if(result)
    {
        window.location = "function/deleteartikel.php?noartikel="+ id+"&kdpenyakit="+kdpenyakit;
    }
}

function removeVideo(id,kdpenyakit)
{
    result = confirm("Apakah anda yakin menghapus ini?");
    if(result)
    {
        window.location = "function/deletevideo.php?novideo="+ id+"&kdpenyakit="+kdpenyakit;
    }
}