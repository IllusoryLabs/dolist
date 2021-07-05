CREATE PROCEDURE `countReminders` ()  
BEGIN

    DECLARE reminderCount INT;
    SET reminderCount = SELECT COUNT(*) FROM reminders;