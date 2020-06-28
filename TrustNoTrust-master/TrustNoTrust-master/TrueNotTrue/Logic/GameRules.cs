using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace TrueNotTrue.Logic
{
    public class GameRules
    {
        //public bool CheckTrust(string[] AllCards, string FakeCard)
        //{
        //    bool checker = true;
        //    foreach (string compareCard in AllCards)
        //    {
        //        if (compareCard != "" & compareCard != FakeCard)
        //            checker = false;
        //    }
        //    return checker;
        //}

        //public void PermitPass(bool? permit, int GameId, int countCard)
        //{
        //    if (permit == null)
        //    {
        //        WaitModel waitModel = DB.WaitModels.FirstOrDefault(x => x.Id == GameId);

        //        if (waitModel.PlayerOneId == Context.ConnectionId)
        //        {
        //            Clients.Client(waitModel.PlayerTwoId).queue("able_pass", countCard);
        //            Clients.Client(waitModel.PlayerOneId).queue("disable_pass", 0);

        //        }
        //        else
        //        {
        //            Clients.Client(waitModel.PlayerOneId).queue("able_pass", countCard);
        //            Clients.Client(waitModel.PlayerTwoId).queue("disable_pass", 0);
        //        }
        //    }
        //}

        //public void Trust() {

        //}

        //public void NoTrust()
        //{

        //}

        //public void Pass()
        //{

        //}
    }
}