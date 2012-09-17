#!/usr/bin/perl

use warnings;


use Net::SMTP;
use MIME::Base64;

if ( $#ARGV < 1 ) {
	die "2 arguments are required";
}

$wt_name	= shift;
$wt_mail	= shift;

#print $wt_name . " ". $wt_mail . "\n";

#die;

#Keep debug off in order for web and email to both work correctly on large messages
$smtp = Net::SMTP->new(
	'smtp.mail.yahoo.com' ,
	# may need a helo parameter here on some servers
	Timeout => 60,
	Debug   => 1,
	connectretries => 2,
	sendretries => 5,
	retryfactor => .25
);

open FILE, "auth.txt" or die "Couldn't open file: $!";
my $wt_auth = <FILE>;
close FILE or die $!;

$smtp->datasend("AUTH PLAIN $wt_auth\n");
$smtp->response();

#  -- Enter email FROM below.   --
$smtp->mail('karim_maarek@yahoo.ca');

#  -- Enter email TO below --
$smtp->to($wt_mail);

$smtp->data();

open FILE, "message2.txt" or die "Couldn't open file: $!";
while(<FILE>) {
	$message .= $_;
}
close FILE;

$message =~ s/wt_name/$wt_name/;
$message =~ s/wt_mail/$wt_mail/;
$wt_url = encode_base64($wt_mail);
$message =~ s/wt_url/$wt_url/;

$smtp->datasend("$message\n");
$smtp->dataend();

# Create CSV output
print $wt_mail . "," . $wt_url . "\n";

$smtp->quit;
