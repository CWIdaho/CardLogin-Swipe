#
# Selects data from swipes table for a specific hard-coded date - should probably accept parameters.
# Groups that data by id, date & timein; calculates minutes spent based on timein & timeout.
# Outer select grabs cwiid & sums the minutes for each id.
#
# Date		Programmer		Summary
# 4/24/2015 jennywokersien	Initial coding.
#
select cwiid, sum(minutes)
from
(
SELECT cwiid, swipedate, time_format(timediff(timeout, timein), '%i') as minutes 
FROM `swipes`
where  swipedate between '2015-04-19' and '2015-04-26'
group by cwiid, swipedate, timein) as swipesByDayId
group by cwiid