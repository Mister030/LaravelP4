DELIMITER $$
DROP PROCEDURE IF EXISTS Sp_UpdateUser$$
CREATE PROCEDURE Sp_UpdateUser(
     IN p_Id       INTEGER
    ,IN p_Name     VARCHAR(50)
    ,IN p_Email    VARCHAR(100)
    ,IN p_Rolename VARCHAR(50)
)
BEGIN
    UPDATE Users as USRS
    SET    USRS.name     = p_Name,
           USRS.email    = p_Email,
           USRS.rolename = p_Rolename
    WHERE  USRS.id = p_Id;
END$$
DELIMITER ;
