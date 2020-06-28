using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using TrueNotTrue.Models;

namespace TrueNotTrue.DAO
{
    public class MoveDAO
    {
        public DataBase db = new DataBase();

        public void AddMove(int gameid, int playerid, int realvalueid, string playervalue, int countcards, bool result)
        {
            //db.Moves.Add(new Move() { GameId = gameid, PlayerId = playerid,  });

            db.SaveChanges();
        }

        //public void AddValue(string onecard, string twocard, string threecard, string fourcard)
        //{
        //    db.Values.Add(new Value() { OneCard = onecard, TwoCard = twocard, ThreeCard = threecard, FourCard = fourcard });

        //    db.SaveChanges();
        //}
    }
}