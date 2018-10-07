#!/usr/bin/perl 
#	Sample perl cgi script.  This script prints a list of the 
#	products in the jadran 'products' table.
#
#	CS545 Fall 2011
#	Code by Alan Riggins
#
   
use DBI;


my $host = "jadran.sdsu.edu";
my $port = "3306";
my $database = "proj4";
my $username = "trst019";
my $password = "trst019";
my $database_source = "dbi:mysql:$database:$host:$port";

	
my $dbh = DBI->connect($database_source, $username, $password) 
or die 'Cannot connect to db';

my $sth = $dbh->prepare("SELECT sku, category, title, short_description, long_description, cost, retail FROM products order by category");
$sth->execute();



$str = "";
while(my @row=$sth->fetchrow_array()) {
    foreach $item (@row) { 
        $str .= $item."|";
        }       
    $str .= ";";    
    }
 

$sth->finish();
$dbh->disconnect();

print "Content-type:  text/html\n\n";    	
print $str;


