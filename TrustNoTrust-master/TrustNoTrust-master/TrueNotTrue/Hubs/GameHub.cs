using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using Microsoft.AspNet.SignalR;
using TrueNotTrue;
using TrueNotTrue.Models;
using TrueNotTrue.Logic;
using System.Web.Script.Serialization;

namespace SignalRMvc.Hubs
{
    public class GameHub : Hub
    {
        DataBase DB = new DataBase();
        public JavaScriptSerializer serializer = new JavaScriptSerializer();
        static List<User> Users = new List<User>();

        // Отправка хода
        public void Send(string allcard)
        {
            Move move = serializer.Deserialize<Move>(allcard);
            move.PlayerId = Context.ConnectionId;
            DB.Moves.Add(move);
            DB.SaveChanges();
            Clients.All.refreshMove();
            PermitPass(move.Trust, move.GameId);
        }

        public void PermitPass(bool? permit, int GameId )
        {
            if (permit == null)
            {
                WaitModel waitModel = DB.WaitModels.FirstOrDefault(x => x.Id == GameId);

                if (waitModel.PlayerOneId == Context.ConnectionId)
                {
                    Clients.Client(waitModel.PlayerTwoId).queue("able_pass");
                    Clients.Client(waitModel.PlayerOneId).queue("disable_pass");
                    
                }
                else
                {
                    Clients.Client(waitModel.PlayerOneId).queue("able_pass");
                    Clients.Client(waitModel.PlayerTwoId).queue("disable_pass");
                }
            }          
        }

        public void EndGame()
        {
            WaitModel waitModel = DB.WaitModels.FirstOrDefault(x => x.PlayerOneId == Context.ConnectionId);
            
            if (waitModel == null)
            {
                waitModel = DB.WaitModels.FirstOrDefault(x => x.PlayerTwoId == Context.ConnectionId);
                Clients.Client(waitModel.PlayerOneId).playAgain(false);
                Clients.Client(waitModel.PlayerTwoId).playAgain(true);
            }
            else
            {
                Clients.Client(waitModel.PlayerOneId).playAgain(true);
                Clients.Client(waitModel.PlayerTwoId).playAgain(false);
            }                
        }

        public bool CheckTrust(string[] AllCards, string FakeCard)
        {
            bool checker = true;
            foreach (string compareCard in AllCards)
            {
                if (compareCard != "" & compareCard != FakeCard)
                    checker = false;
            }
            return checker;
        }

        public void fieldRefresh(int game_id)
        {
            var lastMove = DB.Moves.SqlQuery("select * from DBo.Moves where id = (select max(id) from DBo.Moves where GameId = "+ game_id +")").ToList();           
            Move move = lastMove.FirstOrDefault();

            Updates updates = new Updates();
            updates.OneCard = move.OneCard == null ? "" : move.OneCard;
            updates.TwoCard = move.TwoCard == null ? "" : move.TwoCard;
            updates.ThreeCard = move.ThreeCard == null ? "" : move.ThreeCard;
            updates.FourCard = move.FourCard == null ? "" : move.FourCard;
            updates.FakeCard = move.FakeCard == null ? "" : move.FakeCard;
            updates.CountCard = move.CountCard;
            updates.Notify = move.Notify;

            if (Context.ConnectionId == move.PlayerId)
            {

                if (move.Trust == true)
                {
                    string[] oneCardCompare = move.OneCard.Split('_');
                    string[] twoCardCompare = move.TwoCard.Split('_');
                    string[] threeCardCompare = move.ThreeCard.Split('_');
                    string[] fourCardCompare = move.FourCard.Split('_');

                    string[] allcards = { oneCardCompare[0], twoCardCompare[0], threeCardCompare[0], fourCardCompare[0] };

                    if (CheckTrust(allcards, move.FakeCard))
                    {
                        updates.Distributor = "offtable";
                        Clients.Caller.gettingUpdate(serializer.Serialize(updates));
                    }
                    else
                    {
                        updates.Distributor = "player";
                        Clients.Caller.gettingUpdate(serializer.Serialize(updates));
                    }                    
                }
                else if (move.Trust == false)
                {
                    string[] oneCardCompare = move.OneCard.Split('_');
                    string[] twoCardCompare = move.TwoCard.Split('_');
                    string[] threeCardCompare = move.ThreeCard.Split('_');
                    string[] fourCardCompare = move.FourCard.Split('_');

                    string[] allcards = { oneCardCompare[0], twoCardCompare[0], threeCardCompare[0], fourCardCompare[0] };

                    if (CheckTrust(allcards, move.FakeCard))
                    {
                        updates.Distributor = "player";
                        Clients.Caller.gettingUpdate(serializer.Serialize(updates));
                    }
                    else
                    {
                        updates.Distributor = "enemy";
                        Clients.Caller.gettingUpdate(serializer.Serialize(updates));
                    }
                
                }
                else
                {
                    updates.Distributor = "pass";
                    Clients.Caller.gettingUpdate(serializer.Serialize(updates));
                }
            }
            else
            {
                
                if (move.Trust == true)
                {
                    string[] oneCardCompare = move.OneCard.Split('_');
                    string[] twoCardCompare = move.TwoCard.Split('_');
                    string[] threeCardCompare = move.ThreeCard.Split('_');
                    string[] fourCardCompare = move.FourCard.Split('_');

                    string[] allcards = { oneCardCompare[0], twoCardCompare[0], threeCardCompare[0], fourCardCompare[0] };

                    if (CheckTrust(allcards, move.FakeCard))
                    {
                        updates.Distributor = "offtable";
                        Clients.Caller.gettingUpdate(serializer.Serialize(updates));
                    }
                    else
                    {
                        updates.Distributor = "enemy";
                        Clients.Caller.gettingUpdate(serializer.Serialize(updates));
                    }
                }
                else if (move.Trust == false)
                {
                    string[] oneCardCompare = move.OneCard.Split('_');
                    string[] twoCardCompare = move.TwoCard.Split('_');
                    string[] threeCardCompare = move.ThreeCard.Split('_');
                    string[] fourCardCompare = move.FourCard.Split('_');

                    string[] allcards = { oneCardCompare[0], twoCardCompare[0], threeCardCompare[0], fourCardCompare[0] };

                    if (CheckTrust(allcards, move.FakeCard))
                    {
                        updates.Distributor = "enemy";
                        Clients.Caller.gettingUpdate(serializer.Serialize(updates));
                    }
                    else
                    {
                        updates.Distributor = "player";
                        Clients.Caller.gettingUpdate(serializer.Serialize(updates));
                    }

                }
                else
                {
                    updates.Distributor = "pass";
                    Clients.Caller.gettingUpdate(serializer.Serialize(updates));
                }
                
            }
        }

        public void CreateGame()
        {         
            WaitModel checker = DB.WaitModels.FirstOrDefault(x=>x.Connecting == false);

            if (checker == null) {
                DB.WaitModels.Add(new WaitModel {
                    PlayerOneId = Context.ConnectionId,
                    Connecting = false,
                });
            }
            else
            {
                checker.PlayerTwoId = Context.ConnectionId;
                checker.Connecting = true;
                DB.SaveChanges();
                Clients.Client(checker.PlayerOneId).getWaitModelId(checker.Id);
                Clients.Client(checker.PlayerTwoId).getWaitModelId(checker.Id);
                GetCards();
                PermitPass(null, checker.Id);
            }
            DB.SaveChanges();
        }

        public void GetCards()
        {
            GettingCards gettingCards = new GettingCards();
            WaitModel waitModel = DB.WaitModels.FirstOrDefault(x => x.PlayerTwoId == Context.ConnectionId);
            string twoPlayerCards = gettingCards.GetTwoPlayerCards();
            string onePlayerCards = gettingCards.GetOnePlayerCards();

            Clients.Client(waitModel.PlayerOneId).gettingCards(onePlayerCards);
            Clients.Caller.gettingCards(twoPlayerCards);
        }
    }
}