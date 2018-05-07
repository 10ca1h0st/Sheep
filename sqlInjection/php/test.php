while (preg_match("/^.*((drop)|update)+.*$/i",$username))
{
$username=preg_replace('/(drop|update)/i','',$username);
}