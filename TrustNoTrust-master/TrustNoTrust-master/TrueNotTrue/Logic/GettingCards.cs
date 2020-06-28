using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using TrueNotTrue.Models;
using Newtonsoft.Json;

namespace TrueNotTrue.Logic
{
    public class GettingCards
    {
        DataBase db = new DataBase();
        List<Card> Cards;
        List<Card> OnePlayerCards;
        List<Card> TwoPlayerCards;
        
        Random random;
        public GettingCards()
        {
            Cards = db.Cards.ToList();
            random = new Random();
            DevideCards();
        }

        public void Shuffle()
        {
            for(int i = Cards.Count -1; i>= 1; i--)
            {
                int j = random.Next(i+1);

                var temp = Cards[j];
                Cards[j] = Cards[i];
                Cards[i] = temp;
            }
        }

        public void DevideCards()
        {
            Shuffle();
            OnePlayerCards = Cards.GetRange(0, 26);
            TwoPlayerCards = Cards.GetRange(26,26);
        }
        public string GetOnePlayerCards()
        {
            string onePlayerCards = JsonConvert.SerializeObject(OnePlayerCards, Formatting.Indented);
            return onePlayerCards;
        }
        public string GetTwoPlayerCards()
        {
            string twoPlayerCards = JsonConvert.SerializeObject(TwoPlayerCards, Formatting.Indented);
            return twoPlayerCards;
        }
    }
}